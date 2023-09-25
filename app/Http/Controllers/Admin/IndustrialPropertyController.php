<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\IndustrialProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\City;
use App\Models\DropdownSettings;
use App\Models\Projects;
use App\Models\Properties;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Rap2hpoutre\FastExcel\FastExcel;

class IndustrialPropertyController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if ($request->ajax()) {
			$dropdowns = DropdownSettings::get()->toArray();
			$dropdownsarr = [];
			foreach ($dropdowns as $key => $value) {
				$dropdownsarr[$value['id']] = $value;
			}
			$dropdowns = $dropdownsarr;
			$indId = '';
			foreach ($dropdowns as $key => $value) {
				if($value['name'] == 'Storage/industrial'){
					$indId = $key;
				}
			}
			$data = Properties::with('Projects','Locality')->where('property_category',$indId)->orderBy('id','desc')->get();

			return DataTables::of($data)
				->editColumn('project_id', function ($row) {
					if (isset($row->Projects->project_name)) {
						$project_name = $row->Projects->project_name;
					}else{
						$project_name = '';
					}
					return '<a href="'.route('admin.project.view',encrypt($row->id)).'" style="font-weight: bold;">' . $project_name . '</a>';
				})
				->editColumn('area_id', function ($row) {
					if (isset($row->Locality->name)) {
						return $row->Locality->name;
					}
				})
				->editColumn('property_for', function ($row) use ($dropdowns) {
					return $row->property_for;
				})
			->editColumn('configuration', function ($row) use ($dropdowns) {
					$new_array = array('', 'office space', 'Co-working', 'Ground floor', '1st floor', '2nd floor', '3rd floor', 'Warehouse', 'Cold Storage', 'ind. shed', 'Commercial Land', 'Agricultural/Farm Land', 'Industrial Land', '1 rk', '1bhk', '2bhk', '3bhk', '4bhk', '4+bhk', 'test', 'Plotting');
					$sub_cat = ((!empty($dropdowns[$row->property_category]['name'])) ? ' | ' . $dropdowns[$row->property_category]['name'] : '');
					if (!is_null($row->configuration)) {
						$catId = (int)$row->configuration;
						$getsub_category = $new_array[$catId];
						if (!is_null($getsub_category)) {
							$sub_cat = '  ' . $getsub_category;
							if ($sub_cat == " | Agricultural/Farm Land") {
								$sub_cat = " | Agricultural";
							}
						}
					}
					$category = $sub_cat;
					return $category;
				})
				->editColumn('select_checkbox', function ($row) {
					$abc = '<div class="form-check checkbox checkbox-primary mb-0">
					<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
					<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
					  </div>';
					return $abc;
				})
				->editColumn('contact_details', function ($row) {
					$detail = '';
					if (!empty($row->other_contact_details)) {
						$contacts = json_decode($row->other_contact_details);
						foreach ($contacts as $key => $value) {
							if (!empty($value[0]) && !empty($value[1])) {
								$detail =  '<td align="center" style="vertical-align:top">
								' . $value[0] . ' <br>
								<a href="tel:' . $value[1] . '">' . $value[1] . '</a>
				 				</td>';
								break;
							}
						}
					};
					return $detail;
				})
				->addColumn('actions', function ($row) {
					$buttons = '';
						$buttons =  $buttons . '<a href="'.route('admin.property.edit',$row->id).'"><i role="button" title="Edit" data-id="' . $row->id . '"  class="fs-22 py-2 mx-2 fa-pencil pointer fa  " type="button"></i></a>';
			
				
						$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteProperty(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					
					return $buttons;
				})
			->rawColumns(['project_id', 'contact_details','configuration', 'actions', 'select_checkbox'])
					->make(true);
		}
		$projects = Projects::orderBy('project_name')->get();
		$areas = Areas::orderBy('name')->get();
		$cities = City::orderBy('name')->get();
		$states = State::orderBy('name')->get();
		$property_configuration_settings = DropdownSettings::get()->toArray();
		$prop_type = [];
		foreach ($property_configuration_settings as $key => $value) {
			if (($value['name'] == 'Industrial') && str_contains($value['dropdown_for'],'property_')) {
				array_push($prop_type,$value['id']);
			}
		}
		return view('admin.properties.industrial_index', compact('projects', 'property_configuration_settings', 'areas', 'cities', 'states','prop_type'));
	}

	public function saveProperty(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
	
			$data = IndustrialProperty::find($request->id);
			if (empty($data)) {
				$data =  new IndustrialProperty();
			}
		} else {
			$data =  new IndustrialProperty();
		}
		$data->user_id = Session::get('parent_id');
		$data->added_by = Auth::user()->id;
		$data->property_for = $request->property_for;
		$data->building_id = $request->building_id;
		$data->address = $request->address;
		$data->area_id = $request->area_id;
		$data->city_id = $request->city_id;
		$data->state_id = $request->state_id;
		$data->specific_type = $request->specific_type;
		$data->configuration = $request->configuration;
		$data->zone = $request->zone;
		$data->property_wing = $request->property_wing;
		$data->property_unit_no = $request->property_unit_no;
		$data->property_status = $request->property_status;
		$data->plot_area = $request->plot_area;
		$data->plot_measurement = $request->plot_measurement;
		$data->construction_area = $request->construction_area;
		$data->construction_measurement = $request->construction_measurement;
		$data->hot_property = $request->hot_property;
		$data->pre_leased = $request->is_pre_leased;
		$data->property_description = $request->property_description;
		$data->commission = $request->commision;
		$data->source_of_property = $request->source_of_property;
		$data->price = $request->price;
		$data->price_remarks = $request->price_remarks;
		$data->remarks = $request->property_remarks;
		$data->owner_details = $request->owner_details;
		$data->gpcb = $request->gpcb;
		$data->gpcb_remarks = $request->gpcb_remarks;
		$data->ec_noc = $request->ec_noc;
		$data->ec_noc_remarks = $request->ec_noc_remark;
		$data->bail = $request->bail;
		$data->bail_remarks = $request->bail_remark;
		$data->gujrat_gas = $request->gujrat_gas;
		$data->gujrat_gas_remarks = $request->gujrat_gas_remark;
		$data->discharge = $request->discharge;
		$data->discharge_remarks = $request->discharge_remarks;
		$data->power = $request->power;
		$data->power_remarks = $request->power_remark;
		$data->water = $request->water;
		$data->water_remarks = $request->water_remark;
		$data->machinery = $request->machinery;
		$data->machinery_remarks = $request->machinery_remark;
		$data->etl_necpt = $request->etl_necpt;
		$data->etl_necpt_remarks = $request->etl_necpt_remark;
		$data->save();
		if (!empty($request->plot_measurement)) {
			Helper::add_default_measuerement($request->plot_measurement);
		}
		if (!empty($request->construction_measurement)) {
			Helper::add_default_measuerement($request->construction_measurement);
		}
	}

	public function importProperty(Request $request)
	{
		$file = $request->file('csv_file');
		$name = Str::random(10) . '.xlsx';
		$file->move(storage_path('app'), $name);
		try {
			$collection = (new FastExcel)->import(storage_path('app/' . $name));
		} catch (\Throwable $th) {
			$collection = [];
		}
		unlink(storage_path('app/' . $name));
		foreach ($collection as $key => $value) {

			$building_id = NULL;
			$area_name = Areas::where('name', 'like', '%' . explode('-', $value['Project Name'])[1])->first();
			$building = Projects::where('project_name', 'like', '%' . trim(explode('-', $value['Project Name'])[0]) . '%')->when(!empty(explode('-', $value['Project Name'])[1] && !empty($area_name->name)), function ($query) use ($area_name) {
				$query->where('area_id', $area_name->id);
			})->first();
			if (!empty($building->id) && !empty($value['Project Name'])) {
				$building_id = $building->id;
			}
			$area_id = NULL;
			$area = Areas::where('name', 'like', '%' . $value['Area'])->first();
			if (!empty($area->id) && !empty($value['Area'])) {
				$area_id = $area->id;
			}


			$specific_property_id = NULL;
			$specific_property = DropdownSettings::where('name', 'like', '%' . $value['Specific Property'] . '%')->first();
			if (!empty($specific_property->id) && !empty($value['Specific Property'])) {
				$specific_property_id = $specific_property->id;
			}

			$Configuration_id = NULL;
			$Configuration = DropdownSettings::where('name', 'like', '%' . $value['Configuration'] . '%')->first();
			if (!empty($Configuration->id) && !empty($value['Configuration'])) {
				$Configuration_id = $Configuration->id;
			}

			$plot_measurement_id = NULL;
			$plot_measurement = DropdownSettings::where('name', 'like', '%' . $value['Plot Measurment'] . '%')->first();
			if (!empty($plot_measurement->id) && !empty($value['Plot Measurment'])) {
				$plot_measurement_id = $plot_measurement->id;
			}

			$construction_measurement_id = NULL;
			$construction_measurement = DropdownSettings::where('name', 'like', '%' . $value['Construction Measurment'] . '%')->first();
			if (!empty($construction_measurement->id) && !empty($value['Construction Measurment'])) {
				$construction_measurement_id = $construction_measurement->id;
			}

			$property_source_id = NULL;
			$property_source = DropdownSettings::where('name', 'like', '%' . $value['Source Of Property'] . '%')->first();
			if (!empty($property_source->id) && !empty($value['Source Of Property'])) {
				$property_source_id = $property_source->id;
			}

			$hot_property = 0;
			if ($value['Hot Property'] == 'Yes') {
				$hot_property = 1;
			}
			$pre_leased = 0;
			if ($value['Preleased'] == 'Yes') {
				$pre_leased = 1;
			}

			$gpcb = 0;
			$ecnoc = 0;
			$bail = 0;
			$discharge = 0;
			$gujrat = 0;
			$power = 0;
			$water = 0;
			$etl = 0;
			$machine = 0;

			if ($value['GPCB'] == 'Yes') {
				$gpcb = 1;
			}
			if ($value['ECNoc'] == 'Yes') {
				$ecnoc = 1;
			}
			if ($value['BAIL Membership'] == 'Yes') {
				$bail = 1;
			}
			if ($value['Discharge'] == 'Yes') {
				$discharge = 1;
			}
			if ($value['GujaratGas'] == 'Yes') {
				$gujrat = 1;
			}
			if ($value['Power'] == 'Yes') {
				$power = 1;
			}
			if ($value['Water'] == 'Yes') {
				$water = 1;
			}
			if ($value['ETL_CEPT_NLTL'] == 'Yes') {
				$etl = 1;
			}
			if ($value['List Of Machinary'] == 'Yes') {
				$machine = 1;
			}

			$contact_details = [];
			$arr = [];
			array_push($arr, $value['Property Owner Name1']);
			array_push($arr, $value['Property Owner ContactNo 1']);
			array_push($arr, 'Contactable');
			array_push($contact_details, $arr);
			$arr = [];
			array_push($arr, $value['Property Owner Name2']);
			array_push($arr, $value['Property Owner ContactNo 2']);
			array_push($arr, 'Contactable');
			array_push($contact_details, $arr);
			if ($value['Property For']) {
				$data =  new IndustrialProperty();
				$data->user_id = Session::get('parent_id');
				$data->added_by = Auth::user()->id;
				$data->property_for = $value['Property For'];
				$data->building_id = $building_id;
				$data->address = $value['Address'];
				$data->area_id = $area_id;
				$data->specific_type = $specific_property_id;
				$data->configuration = $Configuration_id;
				$data->zone = $value['Industrial Zone'];
				$data->property_wing = $value['Wing'];
				$data->property_unit_no = $value['UnitNo'];
				$data->property_status = $value['Status'];
				$data->plot_area = $value['Plot Area'];
				$data->plot_measurement = $plot_measurement_id;
				$data->construction_area = $value['Construction Area'];
				$data->construction_measurement = $construction_measurement_id;
				$data->hot_property = $hot_property;
				$data->pre_leased = $pre_leased;
				$data->property_description = $value['Property Description'];
				$data->source_of_property = $property_source_id;
				$data->price = $value['Price'] . ' ' . $value['Price Unit'];
				$data->commission = $value['Commision'];
				$data->price_remarks = $value['Price Remarks'];
				$data->remarks = $value['Remarks'];
				$data->owner_details = json_encode($contact_details);
				$data->gpcb = $gpcb;
				$data->gpcb_remarks = $value['GPCB Remarks'];
				$data->ec_noc = $ecnoc;
				$data->ec_noc_remarks = $value['ECNoc Remarks'];
				$data->bail = $bail;
				$data->bail_remarks = $value['BAIL Membership Remarks'];
				$data->gujrat_gas = $gujrat;
				$data->gujrat_gas_remarks = $value['GujaratGas Remarks'];
				$data->discharge = $discharge;
				$data->discharge_remarks = $value['Discharge Remarks'];
				$data->power = $power;
				$data->power_remarks = $value['Power Remarks'];
				$data->water = $water;
				$data->water_remarks = $value['Water Remarks'];
				$data->machinery = $machine;
				$data->machinery_remarks = $value['List Of Machinary Remarks'];
				$data->etl_necpt = $etl;
				$data->etl_necpt_remarks = $value['ETL_CEPT_NLTLRemarks'];
				$data->save();
			}
		}
	}

	public function importPropertyTemplate()
	{
		$spreadsheet = new Spreadsheet;

		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Property For');
		$sheet->setCellValue('B1', 'Specific Property');
		$sheet->setCellValue('C1', 'Configuration');
		$sheet->setCellValue('D1', 'Price');
		$sheet->setCellValue('E1', 'Price Unit');
		$sheet->setCellValue('F1', 'Status');
		$sheet->setCellValue('G1', 'Property Owner Name1');
		$sheet->setCellValue('H1', 'Property Owner ContactNo 1');
		$sheet->setCellValue('I1', 'Property Owner Name2');
		$sheet->setCellValue('J1', 'Property Owner ContactNo 2');
		$sheet->setCellValue('K1', 'Project Name');
		$sheet->setCellValue('L1', 'Address');
		$sheet->setCellValue('M1', 'Area');
		$sheet->setCellValue('N1', 'Industrial Zone');
		$sheet->setCellValue('O1', 'Wing');
		$sheet->setCellValue('P1', 'UnitNo');
		$sheet->setCellValue('Q1', 'Plot Area');
		$sheet->setCellValue('R1', 'Plot Measurment');
		$sheet->setCellValue('S1', 'Construction Area');
		$sheet->setCellValue('T1', 'Construction Measurment');
		$sheet->setCellValue('U1', 'Source Of Property');
		$sheet->setCellValue('V1', 'Commision');
		$sheet->setCellValue('W1', 'Price Remarks');
		$sheet->setCellValue('X1', 'Remarks');
		$sheet->setCellValue('Y1', 'Hot Property');
		$sheet->setCellValue('Z1', 'Preleased');
		$sheet->setCellValue('AA1', 'Property Description');
		$sheet->setCellValue('AB1', 'GPCB');
		$sheet->setCellValue('AC1', 'GPCB Remarks');
		$sheet->setCellValue('AD1', 'ECNoc');
		$sheet->setCellValue('AE1', 'ECNoc Remarks');
		$sheet->setCellValue('AF1', 'BAIL Membership');
		$sheet->setCellValue('AG1', 'BAIL Membership Remarks');
		$sheet->setCellValue('AH1', 'Discharge');
		$sheet->setCellValue('AI1', 'Discharge Remarks');
		$sheet->setCellValue('AJ1', 'GujaratGas');
		$sheet->setCellValue('AK1', 'GujaratGas Remarks');
		$sheet->setCellValue('AL1', 'Power');
		$sheet->setCellValue('AM1', 'Power Remarks');
		$sheet->setCellValue('AN1', 'Water');
		$sheet->setCellValue('AO1', 'Water Remarks');
		$sheet->setCellValue('AP1', 'ETL_CEPT_NLTL');
		$sheet->setCellValue('AQ1', 'ETL_CEPT_NLTLRemarks');
		$sheet->setCellValue('AR1', 'List Of Machinary');
		$sheet->setCellValue('AS1', 'List Of Machinary Remarks');


		$vvells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS'];
		foreach ($vvells as $key => $value) {
			$spreadsheet->getActiveSheet()->getColumnDimension($value)->setWidth(15);
		}

		$dd1 = Projects::with('Area')->get()->toArray();
		$projects = [];
		foreach ($dd1 as $key => $value) {
			$projects[] = $value['project_name'] . ' - ' . ((isset($value['area']['name'])) ? $value['area']['name'] : '');
		}
		$projects = '"' . implode(",", $projects) . '"';

		$dd2 = Areas::get()->toArray();
		$areas = [];
		foreach ($dd2 as $key => $value) {
			$areas[] = $value['name'];
		}
		$areas = '"' . implode(",", $areas) . '"';

		$dropdowns = DropdownSettings::get()->toArray();
		$dropdownsarr = [];
		foreach ($dropdowns as $key => $value) {
			$dropdownsarr[$value['dropdown_for']][] = $value['name'];
		}

		$propertyFor = '"Rent, Sell"';
		$status = '" Available,SoldOut"';
		$specificType = '"' . implode(",", $dropdownsarr['property_specific_type']) . '"';
		$planType = '"' . implode(",", $dropdownsarr['property_plan_type']) . '"';
		$measurement = '"' . implode(",", $dropdownsarr['property_measurement_type']) . '"';
		$propertySource = '"' . implode(",", $dropdownsarr['property_source']) . '"';
		$priceUnit = '" Thousand, Lac, Crore"';
		$yesNo = '"Yes,No"';
		$arrr = [];
		$zone = '"textline, plastic,engineering,chemical"';
		$arrr['vals'] = [$propertyFor, $specificType, $planType, $priceUnit, $status, $projects, $areas, $zone, $measurement, $measurement, $propertySource, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo, $yesNo];
		$arrr['sheetcell'] = ['A1', 'B1', 'C1', 'E1', 'F1', 'K1', 'M1', 'N1', 'R1', 'T1', 'U1', 'Y1', 'Z1', 'AB1', 'AD1', 'AF1', 'AH1', 'AJ1', 'AL1', 'AN1', 'AP1', 'AR1'];
		$arrr['setsqref'] = ['A2:A1048576', 'B2:B1048576', 'C2:C1048576', 'E2:E1048576', 'F2:F1048576', 'K2:K1048576', 'M2:M1048576', 'N2:N1048576', 'R2:R1048576', 'T2:T1048576', 'U2:U1048576', 'Y2:Y1048576', 'Z2:Z1048576', 'AB2:AB1048576', 'AD2:AD1048576', 'AF2:AF1048576', 'AH2:AH1048576', 'AJ2:AJ1048576', 'AL2:AL1048576', 'AN2:AN1048576', 'AP2:AP1048576', 'AR2:AR1048576'];;

		foreach ($arrr['sheetcell'] as $key => $value) {
			$validation = $spreadsheet->getActiveSheet()->getcell($value)->getDataValidation();
			$validation->setType(DataValidation::TYPE_LIST);
			$validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
			$validation->setAllowBlank(false);
			$validation->setShowInputMessage(true);
			$validation->setShowErrorMessage(true);
			$validation->setShowDropDown(true);
			$validation->setErrorTitle('Input error');
			$validation->setError('Value is not in list.');
			$validation->setPromptTitle('Pick from list');
			$validation->setPrompt('Please pick a value from the drop-down list.');
			$validation->setFormula1($arrr['vals'][$key]);
			$validation->setSqref($arrr['setsqref'][$key]);
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(public_path('imports/IndustrialProperty_sample.xlsx'));
		return redirect(asset('imports/IndustrialProperty_sample.xlsx'));
	}

	public function getSpecificProperty(Request $request)
	{
		if (!empty($request->id)) {
			$data = IndustrialProperty::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = IndustrialProperty::where('id', $request->id)->delete();
			return json_encode($data);
		}

		if (!empty($request->allids) && isset(json_decode($request->allids)[0]) ) {
			$data = IndustrialProperty::whereIn('id', json_decode($request->allids))->delete();
		}
	}
}
