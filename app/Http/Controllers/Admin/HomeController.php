<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\Branches;
use App\Models\Builders;
use App\Models\City;
use App\Models\CompanyDetails;
use App\Models\DashboardWidget;
use App\Models\District;
use App\Models\DropdownSettings;
use App\Models\Enquiries;
use App\Models\EnquiryProgress;
use App\Models\Projects;
use App\Models\Properties;
use App\Models\State;
use App\Models\Subplans;
use App\Models\SuperCity;
use App\Models\Taluka;
use App\Models\Village;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Throwable;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Http\UploadedFile;

class HomeController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Request $request)
	{
		try {
			if (Auth::check()) {
				if (empty(Session::get('plan_id'))) {
					Session::put('plan_id', Auth::user()->id);
				}
				$start_date = null;
				$end_date = Carbon::now()->format('Y-m-d 23:59:59');
				if($request->filled('date_range')){
					if($request->date_range == 'last_month'){
						$start_date = Carbon::now()->startOfMonth()->subMonth()->format('Y-m-d 00:00:00');
					}elseif($request->date_range == '6month'){
						$start_date = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d 00:00:00');
					}elseif($request->date_range == 'yearly'){
						$start_date = Carbon::now()->startOfMonth()->subMonth(12)->format('Y-m-d 00:00:00');
					}
				}

				$totalsales = Enquiries::whereHas('activeProgress', function ($query) {
					$query->where('progress', '=', 'Booked');
				})->where('user_id', Auth::user()->id)->count();

				$total_property = Properties::select('id')->where('user_id', Auth::user()->id);
				$total_enquiry = Enquiries::select('id')->where('user_id', Auth::user()->id);
				$total_project = Projects::select('id')->where('user_id', Auth::user()->id);
				$total_active_leads = Enquiries::select('id')->whereHas('Progress', function($q){
					$q->where('progress','Discussion');
				})->where('user_id', Auth::user()->id);
				$total_lost = Enquiries::select('id')->whereHas('Progress', function($q){
					$q->where('progress','Lost');
				})->where('user_id', Auth::user()->id);
				$total_win = Enquiries::select('id')->whereHas('Progress', function($q){
					$q->where('progress','Booked');
				})->where('user_id', Auth::user()->id);
				if(!is_null($start_date)){
					$total_project = $total_project->whereBetween('created_at',[$start_date,$end_date]);
					$total_enquiry = $total_enquiry->whereBetween('created_at',[$start_date,$end_date]);
					$total_property = $total_property->whereBetween('created_at',[$start_date,$end_date]);
					$total_lost = $total_lost->whereBetween('created_at',[$start_date,$end_date]);
					$total_win = $total_win->whereBetween('created_at',[$start_date,$end_date]);
					$total_active_leads = $total_active_leads->whereBetween('created_at',[$start_date,$end_date]);
				}
				$total_property = $total_property->count('id');
				$total_enquiry = $total_enquiry->count('id');
				$total_project = $total_project->count('id');
				$total_lost = $total_lost->count('id');
				$total_win = $total_win->count('id');
				$total_active_leads = $total_active_leads->count('id');

				$properties_tyeps_enquries = DropdownSettings::where('dropdown_for', 'property_construction_type')->pluck('id', 'name')->toArray();

				$enqs = Enquiries::select(DB::raw('count(*) as total,requirement_type'))->groupBy('requirement_type');
				if(!is_null($start_date)){
					$enqs = $enqs->whereBetween('created_at',[$start_date,$end_date]);
				}
				$enqs = $enqs->get()->toArray();
				if (isset($enqs[0])) {
					$arr = [];
					foreach ($enqs as $key => $value) {
						$arr[$value['requirement_type']] = $value['total'];
					}
					$enqs = $arr;
				}

				$props = Properties::select(DB::raw('count(*) as total,property_type'))->groupBy('property_type');
				if(!is_null($start_date)){
					$props = $props->whereBetween('created_at',[$start_date,$end_date]);
				}
				$props = $props->get()->toArray();
				if (isset($props[0])) {
					$arr = [];
					foreach ($props as $key => $value) {
						$arr[$value['property_type']] = $value['total'];
					}
					$props = $arr;
				}
				$progess = EnquiryProgress::select(DB::raw('count(*) as total,lead_type'))->where('status',1)->whereIn('lead_type', ['hot', 'warm', 'cold'])->groupBy('lead_type');
				if(!is_null($start_date)){
					$progess = $progess->whereBetween('created_at',[$start_date,$end_date]);
				}
				$progess = $progess->get()->toArray();
				if (isset($progess[0])) {
					$arr = [];
					foreach ($progess as $key => $value) {
						$arr[$value['lead_type']] = $value['total'];
					}
					$progess = $arr;
				}
				$todayEnquiry = Enquiries::where('created_at', Carbon::today())->where('user_id', Auth::user()->id)->get();
				$disschedule = EnquiryProgress::where('progress', 'Discussion')->where('status',1)->where('user_id', Auth::user()->id)->where('nfd', Carbon::today())->count();
				$sitevisit = EnquiryProgress::where('progress', 'Site Visit Scheduled')->where('status',1)->where('user_id', Auth::user()->id)->where('nfd', Carbon::today())->count();

				$recentproperty = Properties::with('Projects.Area')->where('user_id', Auth::user()->id)->OrderBy('created_at', 'DESC')->limit(10)->get();

				$enqchart = Enquiries::whereNotNull('requirement_type')
					->select(DB::raw('count(*) as total,requirement_type,MONTH(created_at) month'))
					->where('user_id', Auth::user()->id)
					->groupBy('requirement_type', 'month')
					->whereDate('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())
					->get()
					->toArray();

				$chart1data = [];
				foreach ($enqchart as $key => $value) {
					$enqchart[$key]['requirement_type'] = array_search($value['requirement_type'], $properties_tyeps_enquries);
					if (isset($chart1data[$enqchart[$key]['requirement_type']])) {
						$chart1data[$enqchart[$key]['requirement_type']]['data'][$enqchart[$key]['month']] = $enqchart[$key]['total'];
					} else {
						$chart1data[$enqchart[$key]['requirement_type']] = [];
						$chart1data[$enqchart[$key]['requirement_type']]['name'] = $enqchart[$key]['requirement_type'];
						$chart1data[$enqchart[$key]['requirement_type']]['data'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
						$chart1data[$enqchart[$key]['requirement_type']]['data'][$enqchart[$key]['month']] = $enqchart[$key]['total'];
					}
				}
				$arr = [];
				foreach ($chart1data as $key => $value) {
					unset($value['data'][0]);
					$value['data'] = array_values($value['data']);
					array_push($arr, $value);
				}
				$chart1data = json_encode($arr);

				$propchart = Properties::whereNotNull('property_type')->select(DB::raw('count(*) as total,property_type,MONTH(created_at) month'))->groupBy('property_type', 'month')->where('property_for', 'Rent')->whereDate('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())->get()->toArray();

				$chart2data = [];
				foreach ($propchart as $key => $value) {
					$propchart[$key]['property_type'] = array_search($value['property_type'], $properties_tyeps_enquries);
					if (isset($chart2data[$propchart[$key]['property_type']])) {
						$chart2data[$propchart[$key]['property_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					} else {
						$chart2data[$propchart[$key]['property_type']] = [];
						$chart2data[$propchart[$key]['property_type']]['name'] = $propchart[$key]['property_type'];
						$chart2data[$propchart[$key]['property_type']]['data'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
						$chart2data[$propchart[$key]['property_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					}
				}
				$arr = [];
				foreach ($chart2data as $key => $value) {
					unset($value['data'][0]);
					$value['data'] = array_values($value['data']);
					array_push($arr, $value);
				}
				$prop_added_for_rent = json_encode($arr);

				$propchart = Properties::whereNotNull('property_type')->select(DB::raw('count(*) as total,property_type,MONTH(created_at) month'))->groupBy('property_type', 'month')->where('property_for', 'Sell')->whereDate('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())->get()->toArray();

				$chart2data = [];
				foreach ($propchart as $key => $value) {
					$propchart[$key]['property_type'] = array_search($value['property_type'], $properties_tyeps_enquries);
					if (isset($chart2data[$propchart[$key]['property_type']])) {
						$chart2data[$propchart[$key]['property_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					} else {
						$chart2data[$propchart[$key]['property_type']] = [];
						$chart2data[$propchart[$key]['property_type']]['name'] = $propchart[$key]['property_type'];
						$chart2data[$propchart[$key]['property_type']]['data'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
						$chart2data[$propchart[$key]['property_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					}
				}
				$arr = [];
				foreach ($chart2data as $key => $value) {
					unset($value['data'][0]);
					$value['data'] = array_values($value['data']);
					array_push($arr, $value);
				}
				$prop_added_for_sell = json_encode($arr);

				//deal completed chart

				$propchart = Enquiries::whereNotNull('requirement_type')->whereHas('activeProgress', function ($query) {
					$query->where('progress', '=', 'Booked');
				})->select(DB::raw('count(*) as total,requirement_type,MONTH(created_at) month'))->groupBy('requirement_type', 'month')->where('enquiry_for', 'Rent')->whereDate('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())->get()->toArray();

				$chart2data = [];
				foreach ($propchart as $key => $value) {
					$propchart[$key]['requirement_type'] = array_search($value['requirement_type'], $properties_tyeps_enquries);
					if (isset($chart2data[$propchart[$key]['requirement_type']])) {
						$chart2data[$propchart[$key]['requirement_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					} else {
						$chart2data[$propchart[$key]['requirement_type']] = [];
						$chart2data[$propchart[$key]['requirement_type']]['name'] = $propchart[$key]['requirement_type'];
						$chart2data[$propchart[$key]['requirement_type']]['data'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
						$chart2data[$propchart[$key]['requirement_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					}
				}
				$arr = [];
				foreach ($chart2data as $key => $value) {
					unset($value['data'][0]);
					$value['data'] = array_values($value['data']);
					array_push($arr, $value);
				}
				$prop_rented = json_encode($arr);

				$propchart = Enquiries::whereNotNull('requirement_type')->whereHas('Progress', function ($query) {
					$query->where('status', '=', '1')->where('progress', '=', 'Booked');
				})->select(DB::raw('count(*) as total,requirement_type,MONTH(created_at) month'))->groupBy('requirement_type', 'month')->where('enquiry_for', 'Buy')->whereDate('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())->get()->toArray();

				$chart2data = [];
				foreach ($propchart as $key => $value) {
					$propchart[$key]['requirement_type'] = array_search($value['requirement_type'], $properties_tyeps_enquries);
					if (isset($chart2data[$propchart[$key]['requirement_type']])) {
						$chart2data[$propchart[$key]['requirement_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					} else {
						$chart2data[$propchart[$key]['requirement_type']] = [];
						$chart2data[$propchart[$key]['requirement_type']]['name'] = $propchart[$key]['requirement_type'];
						$chart2data[$propchart[$key]['requirement_type']]['data'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
						$chart2data[$propchart[$key]['requirement_type']]['data'][$propchart[$key]['month']] = $propchart[$key]['total'];
					}
				}
				$arr = [];
				foreach ($chart2data as $key => $value) {
					unset($value['data'][0]);
					$value['data'] = array_values($value['data']);
					array_push($arr, $value);
				}
				$prop_sold = json_encode($arr);



				$totalSource = [];
				$dropdowns = DropdownSettings::get()->toArray();
				$dropdownsarr = [];
				foreach ($dropdowns as $key => $value) {
					$dropdownsarr[$value['id']] = $value;
					if ($value['dropdown_for'] == 'property_source') {
						$totalSource[$value['id']] = [];
						$totalSource[$value['id']]['total'] = 0;
						$totalSource[$value['id']]['id'] = $value['id'];
						$totalSource[$value['id']]['name'] = $value['name'];
					}
				}


				$propertySource = Properties::whereNotNull('source_of_property')->select(DB::raw('count(*) as total,source_of_property'))->groupBy('source_of_property')->get()->toArray();
				$enquirySource = Enquiries::whereNotNull('enquiry_source')->select(DB::raw('count(*) as total,enquiry_source'))->groupBy('enquiry_source')->get()->toArray();

				$totalSourceCount = 0;
				foreach ($propertySource as $key => $value) {
					if (isset($value['source_of_property']) && $value['total'] > 0) {
						$totalSource[$value['source_of_property']]['total'] = $totalSource[$value['source_of_property']]['total'] + $value['total'];
						$totalSourceCount = $totalSourceCount + $value['total'];
					}
				}

				foreach ($enquirySource as $key => $value) {
					if (isset($value['enquiry_source']) && $value['total'] > 0) {
						$totalSource[$value['enquiry_source']]['total'] = $totalSource[$value['enquiry_source']]['total'] + $value['total'];
						$totalSourceCount = $totalSourceCount + $value['total'];
					}
				}
				foreach ($totalSource as $key => $value) {
					if ($value['total'] < 1 || $totalSourceCount < 1) {
						$totalSource[$key]['percent'] = 0;
					}else{
						$totalSource[$key]['percent'] = round(($value['total']*100)/$totalSourceCount);
					}
				}
				$totalSource = array_values($totalSource);
				$enqlatest = Enquiries::with('Employee')->OrderBy('created_at', 'DESC')->limit(10)->get();
				
				$dashboard_widget_positions = [];
				
				$firstChartfromMonth = now()->subMonths(12)->startOfMonth();
        		$firstCharttoMonth = now()->addDay();

				$new_leads = Enquiries::select(DB::raw("(COUNT(*)) as count"),DB::raw("CONCAT(MONTHNAME(created_at), ' ', YEAR(created_at)) as month_year"))
					->whereDate('created_at', '>=', $firstChartfromMonth)
					->whereDate('created_at', '<=', $firstCharttoMonth)
					->where('user_id', Auth::user()->id)
					->groupBy('month_year')
					->get();

				$firstChartperiod = new DatePeriod(
					new DateTime($firstChartfromMonth->addMonth()),
					new DateInterval('P1M'),
					new DateTime($firstCharttoMonth)
				);

				$first_chart = [];
				foreach ($firstChartperiod as $key => $value) {
					$first_chart[$value->format('F')." ". $value->format('Y')] = 0;
				}

				foreach ($new_leads as $new_lead) {
					if(array_key_exists($new_lead->month_year, $first_chart)) {
						$first_chart[$new_lead->month_year] = $new_lead->count;
					}
				}
				
				$second_chart = Enquiries::select([
					DB::raw("(CASE WHEN enquiries.enquiry_source = '103' THEN 'Advertise' WHEN enquiries.enquiry_source = '104' THEN 'Refrence' WHEN enquiries.enquiry_source = '105' THEN '99 - Acres' ELSE 'Unknown' END) AS enquiry_source_case"),	
					DB::raw('count(*) as total_enquiry'),
				])
				->where('enquiry_source','!=',null)
				->where('user_id', Auth::user()->id)
				->groupBy('enquiry_source')
				->get();
				
				$inquiryCounts = Enquiries::select(
					'enquiries.employee_id',
					DB::raw("CONCAT(users.first_name,  users.last_name) as person_name"),
				)
				->join('users', 'enquiries.employee_id','users.id')
				->where('employee_id', '!=', null)
				->where('user_id', Auth::user()->id)
				->get();
		
				$new = $inquiryCounts->groupBy('person_name');
		
				$third_chart = [];
		
				foreach($new->toArray() as $key => $data) {
					array_push($third_chart,[
						'user_name' => $key,
						'total_inquiries' => count($data), 
					]);
				}
				
				$total_lost_leads = Enquiries::select([
					'enquiries.enquiry_source',
					DB::raw("(CASE WHEN enquiries.enquiry_source = '103' THEN 'Advertise' WHEN enquiries.enquiry_source = '104' THEN 'Refrence' WHEN enquiries.enquiry_source = '105' THEN '99 - Acres' ELSE 'Unknown' END) AS enquiry_source_case"),
				])->withCount(['Progress' => function($query) {
					$query->where('progress','Lost');
				}])->where('enquiry_source', '!=', null)->where('user_id', Auth::user()->id)->get();
		
				$fifth_chart = [];
		
				foreach($total_lost_leads->groupBy('enquiry_source_case')->toArray() as $element) {
					$total = 0;
					
					foreach($element as $i) {
						$total += $i['progress_count'];
					}
		
					array_push($fifth_chart,[
						'source_type' => $element[0]['enquiry_source_case'],
						'total_enquiry' => $total,
					]);
				};
				
				$seventh_chart = EnquiryProgress::select([
					'progress',	
					DB::raw('count(*) as total_enquiry'),
				])
				->where('progress','!=',null)
				->where('user_id', Auth::user()->id)
				->groupBy('progress')
				->get();
				
				return view('admin.dashboard', compact('total_property', 'total_enquiry','first_chart', 'second_chart' , 'third_chart', 'fifth_chart', 'seventh_chart', 'properties_tyeps_enquries', 'enqs', 'props', 'progess', 'todayEnquiry', 'disschedule', 'sitevisit', 'recentproperty', 'enqchart', 'chart1data', 'dropdownsarr', 'enqlatest', 'prop_added_for_rent', 'prop_added_for_sell', 'prop_rented', 'prop_sold','totalSource','total_project','total_win','total_lost','total_active_leads','totalsales','dashboard_widget_positions'));
			}
			return redirect()->route('admin.login');
		} catch (Throwable $e) {
			report($e);
		}
	}

	public function getCities(Request $request)
	{
		if ($request->ajax()) {
			$data = City::all();
			return DataTables::of($data)->make(true);
		}
		$states = State::orderBy('name')->get()->toArray();
		return view('admin.city.index',compact('states'));
	}

	public function importCity(Request $request)
	{
		if(!empty($request->state_id)){
			$allcity = SuperCity::whereIn('id',$request->city_array)->get();
			foreach ($allcity as $key => $value) {
				$exist = City::where('name',$value->name)->where('state_id',$value->state_id)->first();
				if (empty($exist->id)) {
					$state = State::find($value->state_id);
					$current_user_state = State::where('user_id',Auth::user()->id)->where('name', $state->name)->first();

					$new_state_id = $state->id;
					    
					if(!$current_user_state) {
						$new_state = new State();
						$new_state->fill([
							'name' => $state->name,
							'user_id' => Auth::user()->id,
						])->save();
						
						$new_state_id = $new_state->id;
					} else {
						$new_state_id = $current_user_state->id;
					}
					
					$city = new City();
					$city->user_id = Auth::user()->id;
					$city->name = $value->name;
					$city->state_id = $new_state_id;
					$city->save();
				}
			}
		}
	}

	public function getActivityLogs(Request $request)
	{
		if ($request->ajax()) {
			$data = Activity::where('user_id', Session::get('parent_id'))->with('causer')->get();
			return DataTables::of($data)
				->editColumn('new', function ($row) {
					$properties = json_decode($row->properties, true);
					$mega_desc_new = '';
					if (isset($properties['attributes'])) {
						foreach ($properties['attributes'] as $key => $value) {
							$mega_desc_new = $mega_desc_new . $key . ' : ' . $value . ' , ';
						}
					}
					return $mega_desc_new;
				})
				->editColumn('old', function ($row) {
					$properties = json_decode($row->properties, true);
					$mega_desc_old = '';
					if (isset($properties['old'])) {
						foreach ($properties['old'] as $key => $value) {
							$mega_desc_old = $mega_desc_old . $key . ' : ' . $value . ' , ';
						}
					}
					return $mega_desc_old;
				})
				->editColumn('subject', function ($row) {
					return str_replace('AppModels', '', str_replace('\\', '', $row->subject_type));
				})
				->editColumn('activity', function ($row) {
					return $row->description;
				})
				->editColumn('user', function ($row) {
					if (!empty($row->causer->first_name)) {
						return $row->causer->first_name . ' ' . $row->causer->last_name;
					}
				})
				->editColumn('created_at', function ($row) {
					return Carbon::parse($row->created_at)->format('d-m-Y H:i:s');
				})
				->make(true);
		}
		return view('admin.logs.index');
	}

	public function plan_index(Request $request)
	{
		$plans = Subplans::get();
		return view('admin.userplans.index', compact('plans'));
	}

	public function search(Request $request)
	{
		if ($request->ajax() && !empty($request->search)) {
			$enquiries  = Enquiries::where('client_name', 'LIKE', "%{$request->search}%")->get()->toArray();
			$projects  = Projects::where('project_name', 'LIKE', "%{$request->search}%")->get()->toArray();
			$users  = User::where('parent_id',Session::get('parent_id'))  ->where(function($query) use ($request){
				$query->where('first_name', 'LIKE', "%{$request->search}%")->orWhere('last_name', 'LIKE', "%{$request->search}%");
			})->get()->toArray();
			$builders  = Builders::where('name', 'LIKE', "%{$request->search}%")->get()->toArray();
			$areas  = Areas::where('name', 'LIKE', "%{$request->search}%")->get()->toArray();

			$properties = Properties::where('owner_name', 'LIKE', "%{$request->search}%")->get()->toArray();

			$data['enquiries'] = $enquiries;
			$data['projects'] = $projects;
			$data['users'] = $users;
			$data['areas'] = $areas;
			$data['properties'] = $properties;
			
			return json_encode($data);
		}
	}

	public function plan_save(Request $request)
	{
		Subplans::get();
		
		$plan_detail = Subplans::find(intval($request->plan_id));

		User::where('id', Session::get('parent_id'))->update([
			'plan_id' => $request->plan_id,
			'total_user_limit' => $plan_detail->user_limit,
			'subscribed_on' => Carbon::now()->format('Y-m-d')
		]);

		Session::put('plan_id', $request->plan_id);
		
		return redirect()->route('admin');
	}

	public function upgrade_plan(Request $request)
	{
		Subplans::get();
		
		$plan_detail = Subplans::find(intval($request->plan_id));

		$user = User::find(Auth::user()->id);
		$user_limit = intval($user->total_user_limit) + intval($plan_detail->user_limit);

		$user->fill([
			'plan_id' => $request->plan_id,
			'total_user_limit' => $user_limit,
			'subscribed_on' => Carbon::now()->format('Y-m-d'),
		])->save();

		Session::put('plan_id', $request->plan_id);
		
		return redirect()->back();
	}

	public function upgrade_user_limit(Request $request)
	{
		$user = User::find(Auth::user()->id);
		$user_limit = intval($user->total_user_limit) + intval($request->user_limit); 
		
		$user->fill([
			'total_user_limit' => $user_limit
		])->save();

		return response()->json('success');
	}
    
	public function ProfileDetails(){
		$user =  Auth::user()->id;
		$plans = Subplans::get();
		$user = User::with('Branch','State','City')->where('id',$user)->first();
		$user_count =  User::where('parent_id',Auth::User()->id)->orWhere('id',Auth::User()->id)->get()->count();
		$cities = City::orderBy('name')->get()->toArray();
		$states = State::orderBy('name')->get()->toArray();
		return view('admin.users.profile_details',compact('user','plans','user_count','cities','states'));
	}

	public function Settings(Request $request){
		$city =  City::get()->where('user_id',Auth::user()->id)->count();
		$state =  State::get()->where('user_id',Auth::user()->id)->count();
		$area =  Areas::get()->where('user_id',Auth::user()->id)->count();
		$total_district = District::get()->where('user_id',Auth::user()->id)->count();
		$total_taluka = Taluka::get()->where('user_id',Auth::user()->id)->count();
		$total_village = Village::get()->where('user_id',Auth::user()->id)->count();

		$builder =  Builders::get()->count();
		$branch =  Branches::get()->count();
		$user =  User::where('parent_id',Auth::User()->id)->orWhere('id',Auth::User()->id)->get()->count();
		$role = Role::where('user_id', Session::get('parent_id'))->get()->count();
		$enquiry = DropdownSettings::where('dropdown_for', 'LIKE', "%enquiry_%")->get()->count();
		$building = DropdownSettings::where('dropdown_for', 'LIKE', "%building_%")->get()->count();
		$property = DropdownSettings::where('dropdown_for', 'LIKE', "%property_%")->get()->count();

		return view('admin.settings.settings_page',compact('city','state','builder','branch','area','user','role','enquiry','building','property','total_district','total_taluka','total_village'));
	}
    
	public function chnagePassword(Request $request)
	{
		$params = $request->all();
		$user_id =  Auth::user()->id;
		$user = User::select('id','email','password')->where('id',$user_id)->first();
		if(!$user)
		{
			return response(['false' => true,'message' => 'Something went wrong'], 200);

		}
		if(!Hash::check($params['oldPwd'],$user->password)) {
			return response(['false' => true,'message' => 'old password is wrong'], 200);
		}
	    $user->update(['password' => Hash::make($params['newPwd'])]);
		return response(['success' => true,'message' => 'Password change successfully!!'], 200);
	}

	public function storeFile(UploadedFile $file)
    {
        $path = "company_".time().(string) random_int(0,5).'.'.$file->getClientOriginalExtension();
        $file->storeAs("public/file_image/",$path);
        return $path;
    }
    
	public function chnageProfile(Request $request){

		$params = $request->all();
		$user_id =  Auth::user()->id;
		$user = User::select('id','email','password')->where('id',$user_id)->first();
		if(!$user)
		{
			return response(['false' => true,'message' => 'Something went wrong'], 200);

		}
		$profile_details = array(
			'first_name'    =>  $params['firstname'],   
			'last_name'     =>  $params['lastname'],   
			'mobile_number' =>  $params['mobile_number'],   
			'company_name'  =>  $params['company_name'],
			'address'  =>  $params['address'],
		);

		if($request->profile_image) {
			$profile_details['company_logo'] = $this->storeFile($request->profile_image); 
		}
		
	    $user->update($profile_details);
		return response(['success' => true,'message' => 'Profile change successfully!!'], 200);
	}

	/* Visiting
	 Card 
	 Function
	*/
	public function VisitingCard(){
		$user_id=Auth::user()->id;//Get Admin Data
		$company=CompanyDetails::where('user_id',$user_id)->first();
		return view('admin.visitingcard.card',compact('company'));
	}
	public function savecompany(Request $request)
	{
		$user_id=Auth::user()->id;
		$company=CompanyDetails::find($request->id);
		$company->user_id= $user_id;
		$company->company_name=$request->company_name;
		$company->company_email=$request->company_email;
		$company->company_site=$request->company_site;
		$company->company_contact=$request->company_contact;
		$company->position=$request->company_position;
		$company->company_logo=$request->company_logo;
		$company->company_gst=$request->company_gst;
		$company->save();
		return response()->json(['status'=>'success']);
		// return redirect('/VisitingCard');
	}
}
