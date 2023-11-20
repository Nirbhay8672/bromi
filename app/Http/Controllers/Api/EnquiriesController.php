<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Areas;
use App\Models\Taluka;
use App\Helpers\Helper;
use App\Models\Village;
use App\Models\Branches;
use App\Models\District;
use App\Models\Projects;
use App\Models\Enquiries;
use App\Models\Properties;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AssignHistory;
use App\Models\QuickSiteVisit;
use App\Models\EnquiryComments;
use App\Models\EnquiryProgress;
use App\Models\DropdownSettings;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB as FacadesDB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Illuminate\Support\Arr;


class EnquiriesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		$perPage = $request->input('per_page', 10);
        $property = Enquiries::paginate($perPage);
		return response()->json(['status' => '200','message' => 'List of Enquiry', 'data' => $property]);

	}

	public function saveEnquiry(Request $request)
	{
		try {
			if (!empty($request->id) && $request->id != '') {
				$data = Enquiries::find($request->id);
				$message='Enquirie Updated Successfully';
				if (empty($data)) {				
					$message='Enquirie Added Successfully';
					$data =  new Enquiries();
				}
			} else {
				$message='Enquirie Added Successfully';
				$data =  new Enquiries();
			}
	
			$data->added_by = Auth::user()->id;
			$data->user_id = Session::get('parent_id');
			$data->client_name = $request->client_name;
			$data->client_mobile = $request->client_mobile;
			$data->client_email = $request->client_email;
			$data->is_nri = $request->is_nri;
			$data->enquiry_for = $request->enquiry_for;
			$data->requirement_type = $request->requirement_type;
			$data->property_type = $request->property_type;
			$data->configuration = json_encode($request->configuration);
			$data->area_from = $request->area_from;
			$data->area_to = $request->area_to;
			$data->area_from_measurement = $request->area_from_measurement;
			$data->area_to_measurement = $request->area_to_measurement;
			$data->enquiry_source = $request->enquiry_source;
			$data->furnished_status = $request->furnished_status;
			$data->budget_from = $request->budget_from;
			$data->budget_to = $request->budget_to;
			$data->purpose = $request->purpose;
			$data->building_id = $request->building_id;
			$data->enquiry_status = $request->enquiry_status;
			$data->project_status = $request->project_status;
			$data->area_ids = $request->area_ids;
			$data->is_preleased = $request->is_preleased;
			$data->other_contacts = $request->other_contacts;
			$data->telephonic_discussion = $request->telephonic_discussion;
			$data->highlights = $request->highlights;
			$data->enquiry_city_id = $request->enquiry_city_id;
			$data->enquiry_branch_id = $request->enquiry_branch_id;
			$data->employee_id = $request->employee_id;
			$data->is_favourite = $request->is_favourite;
			$data->district_id = $request->district_id;
			$data->taluka_id = $request->taluka_id;
			$data->village_id = $request->village_id;
			$data->zone_id    = isset($request->zone) ? $request->zone : NULL;
			$data->save();
			if (!empty($request->area_measurement)) {
				Helper::add_default_measuerement($request->area_measurement);
			}
			return response()->json(['status' => '200','message' => $message, 'data' => $data]);
		} catch (\Exception $e) {
			dd($e);
		}
		
	}

	public function show($id)
	{
		
        $Enquiries = Enquiries::find($id);
		return response()->json(['status' => '200','message' => 'Enquirie Details ', 'data' => $Enquiries]);

	}
	public function destory($id)
	{
		$Enquiries = Enquiries::destroy($id);
		return response()->json(['status' => '200','message' => 'Enquirie Deleted Successfully ']);

	}
	




}
