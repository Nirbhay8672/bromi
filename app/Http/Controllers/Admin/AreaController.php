<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\City;
use App\Models\State;
use App\Models\SuperAreas;
use App\Models\SuperCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\FastExcel;

class AreaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Areas::with('City', 'State')->when($request->go_data_id, function ($query) use ($request) {
				return $query->where('id', $request->go_data_id);
			})->orderBy('id','desc')->get();
			$newarr = [];
			$twoarr = [];
			if (!empty(Auth::User()->city_id)) {
				foreach ($data as $key => $value) {
					if ($value->city_id == Auth::User()->city_id) {
						array_push($newarr,$value);
					}else{
						array_push($twoarr,$value);
					}
				}
				$data = array_merge($newarr,$twoarr);
			}

			return DataTables::of($data)
			->editColumn('select_checkbox', function ($row) {
				$abc = '<div class="form-check checkbox checkbox-primary mb-0">
				<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
				<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  </div>';
				return $abc;
			})
				->editColumn('city', function ($row) {
					if (isset($row->City->name)) {
						return $row->City->name;
					}
					return '';
				})
				->editColumn('state', function ($row) {
					if (isset($row->State->name)) {
						return $row->State->name;
					}
					return '';
				})
				->editColumn('status', function ($row) {
					if ($row->status) {
						return 'active';
					} else {
						return 'not active';
					}
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
						$buttons =  $buttons . '<i role="button" title="Edit" data-id="' . $row->id . '" onclick=getArea(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';
				
						$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteArea(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					
					return $buttons;
				})
				->rawColumns(['Actions','select_checkbox'])
				->make(true);
		}
		$cities = City::orderBy('name')->get()->toArray();
		$states = State::orderBy('name')->get()->toArray();
		$supercities = SuperCity::orderBy('name')->get()->toArray();
		return view('admin.areas.index', compact('cities', 'states','supercities'));
	}

	public function saveArea(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
	
			$data = Areas::find($request->id);
			if (empty($data)) {
				$exist = Areas::where('name',$request->name)->where('city_id',$request->city_id)->first();
				if (!empty($exist)) {
					return;
				}
				$data =  new Areas();
			}
		} else {
			$exist = Areas::where('name',$request->name)->where('city_id',$request->city_id)->first();
			if (!empty($exist)) {
				return;
			}
			$data =  new Areas();
		}
		$data->user_id = Session::get('parent_id');
		$data->name = $request->name;
		$data->city_id = $request->city_id;
		$data->pincode = $request->pincode;
		$data->state_id = $request->state_id;
		$data->status = $request->status;
		$data->save();
	}

	public function importArea(Request $request)
	{
		if($request->ajax())
		{
			if(!empty($request->state_id) && !empty($request->city_id))
			{
				$allarea = SuperAreas::where('state_id',$request->state_id)->where('super_city_id',$request->city_id)->get();

				foreach ($allarea as $key => $value)
				{
					$state_obj = State::find($request->state_id);
					$user_state = State::where('name',$state_obj->name)->where('user_id',Auth::user()->id)->first();

					$state_id = 0;
					if($user_state)
					{
						$state_id = $user_state->id;
					}
					else
					{
						$new_state = new State();
						$new_state->fill([
							'name' => $state_obj->name,
							'user_id' => Auth::user()->id,
						])->save();

						$state_id = $new_state->id;
					}

					$super_city = SuperCity::find($request->city_id);

					$city = City::where('name',$super_city->name)
						->where('user_id', Auth::user()->id)
						->first();

					$city_id = 0;

					if(empty($city))
					{
						$city = City::create([
						    'name'=>$super_city->name,
						    'state_id'=>$state_id,
						    'user_id'=> Auth::User()->id
					    ]);

						$city_id = $city->id;
					} else {
						$city_id = $city->id;
					}

					$exist = Areas::where('name',$value->name)
						->where('city_id',$city->id)
						->where('user_id', Auth::user()->id)
						->first();

					if (empty($exist->id)){
						$areas = new Areas();
						$areas->user_id = Auth::user()->id;
						$areas->name = $value->name;
						$areas->city_id = $city_id;
						$areas->pincode = $value->pincode;
						$areas->state_id =$state_id;
						$areas->save();
					}
				}
			}
		}
	}

	public function getSpecificArea(Request $request)
	{
		if (!empty($request->id)) {
			$data = Areas::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}


	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Areas::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0]) ) {
			$data = Areas::whereIn('id', json_decode($request->allids))->delete();
		}
	}
}
