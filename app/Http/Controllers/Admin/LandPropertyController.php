<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\LandProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\City;
use App\Models\District;
use App\Models\DropdownSettings;
use App\Models\IndustrialProperty;
use App\Models\LandImages;
use App\Models\Projects;
use App\Models\Properties;
use App\Models\State;
use App\Models\Taluka;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class LandPropertyController extends Controller
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
			// Bharat land/plot filter
			$indId = [];
			foreach ($dropdowns as $key => $value) {
				if ($value['name'] ==  'Land/Plot' || $value['name'] ==  'Plot/Land') {
					$indId[] = $key;
				}
			}
			$data = Properties::with('Projects', 'Locality', 'Village')
				->where('property_category', $indId[0])
				->orWhere('property_category', $indId[1])
				->orderBy('id', 'desc')->get();

			return DataTables::of($data)
				->editColumn('village_id', function ($row) {
					if (isset($row->Village->name)) {
						$name = $row->Village->name;
					} else {
						$name = '';
					}
					return '<a href="' . route('admin.project.view', encrypt($row->id)) . '" style="font-weight: bold;">' . $name . '</a>';
				})
				->editColumn('survey', function ($row) {
					return $row->survey_number;
				})
				->editColumn('fp', function ($row) {
					return $row->fp_number;
				})
				->editColumn('survey_price', function ($row) {
					return $row->survey_price;
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
				->editColumn('select_checkbox', function ($row) {
					$abc = '<div class="form-check checkbox checkbox-primary mb-0">
					<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
					<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
					  </div>';
					return $abc;
				})
				->addColumn('actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<a href="' . route('admin.property.edit', $row->id) . '"><i role="button" title="Edit" data-id="' . $row->id . '"  class="fs-22 py-2 mx-2 fa-pencil pointer fa  " type="button"></i></a>';

					$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteProperty(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';

					return $buttons;
				})
				->rawColumns(['village_id', 'contact_details', 'actions', 'select_checkbox'])
				->make(true);
		}
		$areas = Areas::orderBy('name')->get();
		$cities = City::orderBy('name')->get();
		$states = State::orderBy('name')->get();
		$districts = District::orderBy('name')->get();
		$talukas = Taluka::orderBy('name')->get();
		$villages = Village::orderBy('name')->get();
		$property_configuration_settings = DropdownSettings::get()->toArray();
		$prop_type = [];
		foreach ($property_configuration_settings as $key => $value) {
			if (($value['name'] == 'Land/Plot') && str_contains($value['dropdown_for'], 'property_')) {
				array_push($prop_type, $value['id']);
			}
		}
		return view('admin.properties.land_index', compact('property_configuration_settings', 'areas', 'cities', 'states', 'districts', 'talukas', 'villages', 'prop_type'));
	}

	public function saveProperty(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {

			$data = LandProperty::find($request->id);
			if (empty($data)) {
				$data =  new LandProperty();
			}
		} else {
			$data =  new LandProperty();
		}
		$data->user_id = Session::get('parent_id');
		$data->added_by = Auth::user()->id;
		$data->specific_type = $request->specific_type;
		$data->district_id = $request->district_id;
		$data->taluka_id = $request->taluka_id;
		$data->village_id = $request->village_id;
		$data->zone = $request->zone;
		$data->fsi = $request->fsi;
		$data->configuration = $request->configuration;
		$data->survey_number = $request->survey_number;
		$data->plot_size = $request->plot_size;
		$data->plot_measurement = $request->plot_measurement;
		$data->price = $request->price;
		$data->tp_number = $request->tp_number;
		$data->fp_number = $request->fp_number;
		$data->plot2_size = $request->plot2_size;
		$data->plot2_measurement = $request->plot2_measurement;
		$data->price2 = $request->price2;
		$data->address = $request->address;
		$data->remarks = $request->remarks;
		$data->status = $request->status;
		$data->location_url = $request->location_url;
		$data->property_source = $request->property_source;
		$data->refrence = $request->refrence;
		$data->owner_details = $request->owner_details;
		$data->save();
		if (!empty($request->plot_measurement)) {
			Helper::add_default_measuerement($request->plot_measurement);
		}
		if (!empty($request->plot2_measurement)) {
			Helper::add_default_measuerement($request->plot2_measurement);
		}
	}


	public function getSpecificProperty(Request $request)
	{
		if (!empty($request->id)) {
			$data = LandProperty::with('Images')->where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function saveLandImages(Request $request)
	{
		$landId = $request->input('land_id');
		$proId = $request->input('pro_id');
		$images = $request->file('images');
		$documents = $request->file('documents');

		if (!empty($images) || !empty($documents)) {
			foreach ($images as $key => $image) {
				$ext = $image->getClientOriginalExtension();
				$fileName = str_replace('.' . $ext, '', $image->getClientOriginalName()) . "-" . time() . '.' . $ext;
				$fileName = str_replace('#', '', $fileName);
				$path = public_path() . config('constant.land_images_url'); // Update the path for images
				File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
				$moved = $image->move($path, $fileName);
				if ($moved) {
					$land_image = new LandImages();
					$land_image->land_id = $landId;
					$land_image->image = $fileName;
					$land_image->user_id = Auth::user()->id; // Use 'user' instead of 'User'
					$land_image->pro_id = $proId;
					$land_image->save();
				}
			}

			foreach ($documents as $key => $document) {
				$ext = $document->getClientOriginalExtension();
				$fileName = str_replace('.' . $ext, '', $document->getClientOriginalName()) . "-" . time() . '.' . $ext;
				$fileName = str_replace('#', '', $fileName);
				$path = public_path() . config('constant.land_documents_url'); // Update the path for documents
				File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
				$moved = $document->move($path, $fileName);
				if ($moved) {
					$land_image = new LandImages();
					$land_image->land_id = $landId;
					$land_image->image = $fileName; // Adjust the field name as per your database structure
					$land_image->user_id = Auth::user()->id; // Use 'user' instead of 'User'
					$land_image->pro_id = $proId;
					// $land_image->is_document = true; // Add a flag to indicate it's a document
					$land_image->save();
				}
			}
		}

		$allImagesAndDocuments = LandImages::where('land_id', $landId)->pluck('image')->toArray();

		$response = [
			'images_and_documents' => $allImagesAndDocuments,
		];

		return response()->json($response);
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = LandProperty::where('id', $request->id)->delete();
			return json_encode($data);
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0])) {
			$data = LandProperty::whereIn('id', json_decode($request->allids))->delete();
		}
	}
}
