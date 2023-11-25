<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\Properties;
use Illuminate\Support\Facades\Hash;
// use Auth;
// use Validator;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class propertyController extends Controller
{
    public function index(Request $request)
    {
		$perPage = $request->input('per_page', 10);
        $property = Properties::paginate($perPage);
		return response()->json(['status' => '200','message' => 'List of Property', 'data' => $property]);

	}
	public function show($id)
    {
		$show=Properties::find($id);
		return response()->json(['status' => '200','message' => 'Property list By Id', 'data' => $show]);

	}
   
     public function saveProperty(Request $request)
	{
		try {
			if (!empty($request->id) && $request->id != '') {
				$property = Properties::find($request->id);
				$message='property Updated Successfully';
				if (empty($data)) {				
					$message='property Added Successfully';
					$property = new Properties();
				}
			} else {
				$message='property Added Successfully';
				$property = new Properties();
			}
			// Set the property data directly from the request
			$property->property_for = $request->input('property_for');
			$property->property_type = $request->input('property_type');
			$property->property_category = $request->input('property_category');
			$property->configuration = $request->input('configuration');
			$property->project_id = $request->input('project_id');
			$property->locality_id = $request->input('locality_id');
			$property->address = $request->input('address');
			$property->location_link = $request->input('property_link');
			$property->district_id = $request->input('district_id');
			$property->taluka_id = $request->input('taluka_id');
			$property->village_id = $request->input('village_id');
			$property->zone_id = $request->input('zone_id');
			$property->constructed_carpet_area = $request->input('constructed_carpet_area').$request->input('constructed_carpet_area_id');
			$property->constructed_salable_area = $request->input('constructed_salable_area').$request->input('constructed_salable_area_id');
			$property->constructed_builtup_area = $request->input('constructed_builtup_area').$request->input('constructed_builtup_area_id');
			$property->salable_plot_area = $request->input('salable_plot_area').$request->input('salable_plot_area_id');
			$property->carpet_plot_area = $request->input('carpet_plot_area').$request->input('carpet_plot_area_id');
			$property->salable_area = $request->input('salable_area').$request->input('salable_area_mes_id');
			$property->carpet_area = $request->input('carpet_area').$request->input('carpet_area_mes_id');
			$property->storage_centre_height = $request->input('storage_centre_height').$request->input('storage_centre_height_mes');
			$property->length_of_plot = $request->input('length_of_plot').$request->input('length_of_plot_mes');
			$property->width_of_plot = $request->input('width_of_plot').$request->input('width_of_plot_mes');
			$property->entrance_width = $request->input('entrance_width').$request->input('entrance_width_mes');
			$property->ceiling_height = $request->input('ceiling_height').$request->input('ceiling_height_mes');
			$property->builtup_area = $request->input('builtup_area').$request->input('builtup_area_mes_id');
			$property->plot_area = $request->input('plot_area').$request->input('plot_area_mes_id');
			$property->terrace = $request->input('terrace').$request->input('terrace_mes_id');
			$property->construction_area = $request->input('construction_area').$request->input('construction_area_mess_id');
			$property->terrace_carpet_area = $request->input('terrace_carpet_area').$request->input('terrace_carpet_area_mes_id');
			$property->terrace_salable_area = $request->input('terrace_salable_area').$request->input('terrace_salable_area_mes_id');
			$property->total_units_in_project = $request->input('total_units_in_project');
			$property->total_no_of_floor = $request->input('total_no_of_floor');
			$property->total_units_in_tower = $request->input('total_units_in_tower');
			$property->property_on_floors = $request->input('property_on_floors');
			$property->no_of_elavators = $request->input('no_of_elavators');
			$property->no_of_balcony = $request->input('no_of_balcony');
			$property->total_no_of_units = $request->input('total_no_of_units');
			$property->no_of_room = $request->input('no_of_room');
			$property->no_of_bathrooms = $request->input('no_of_bathrooms');
			$property->no_of_floors_allowed = $request->input('no_of_floors_allowed');
			$property->no_of_side_open = $request->input('no_of_side_open');
			$property->service_elavator = $request->input('service_elavator');
			$property->owner_is         = $request->owner_is;
			$property->owner_name       = $request->owner_name;
			$property->owner_contact        = $request->owner_contact;
			$property->owner_email              = $request->owner_email;
			$property->owner_nri        = $request->owner_nri;
			$property->servant_room = $request->input('servant_room');
			$property->hot_property = $request->input('hot_property');
			$property->is_favourite = $request->input('is_favourite');
			$property->is_terrace = $request->input('is_terrace');
			$property->is_pre_leased = $request->input('is_pre_leased');
			$property->front_road_width = $request->input('front_road_width').$request->input('front_road_width_mes');
			$property->construction_allowed_for = $request->input('construction_allowed_for');
			$property->fsi = $request->input('fsi');
			$property->no_of_borewell = $request->input('no_of_borewell');
			$property->fourwheller_parking = $request->input('fourwheller_parking');
			$property->twowheeler_parking = $request->input('twowheeler_parking');
			$property->pre_leased_remarks = $request->input('pre_leased_remarks');
			$property->Property_priority = $request->input('Property_priority');
			$property->source_of_property = $request->input('property_source');
			$property->property_source_refrence = $request->input('refrence');
			$property->availability_status = $request->input('availablity_status');
			$property->available_from = $request->input('available_from');
	
			// Handle the 'amenities' array
			if ($request->has('amenities') && is_array($request->amenities)) {
				$property->amenities = json_encode($request->amenities);
			}
	
			// Handle the 'unit_details' array
			if ($request->has('unit_details') && is_array($request->unit_details)) {
				$unitDetails = [];
				foreach ($request->unit_details as $unitData) {
					$unitDetails[] = [
						'wing' => $unitData['wing'] ?? null,
						'unit_no' => $unitData['unit_no'] ?? null,
						'unit_status' => $unitData['unit_status'] ?? null,
						'construction_price' => $unitData['construction_price'] ?? null,
						'plot_price' => $unitData['plot_price'] ?? null,
						'price' => $unitData['price'] ?? null,
					];
				}
				$property->unit_details = json_encode($unitDetails);
			}
	
			// Handle the 'other_industrial_fields' array
	   
		
				$array=["pollution_control_board","ec_noc","bail","discharge","gujrat_gas","power","water","machinery","etl_necpt"];
				$other_industrial_fields=[$request->pollution_control_board,
					$request->ec_noc,
					$request->bail,
					$request->discharge,
					$request->gujrat_gas,
					$request->power,
					$request->water,
					$request->machinery,
					$request->etl_necpt];
					$dataArray=[$other_industrial_fields,$array];
					$property->other_industrial_fields = json_encode($dataArray);
	
			// Handle the 'other_contact_details' array
				if ($request->has('other_contact_details') && is_array($request->other_contact_details)) {
					$otherContactDetails = [];
					
					foreach ($request->other_contact_details as $contactData) {
						$otherContactDetails[] = [
							'name' => $contactData['name'] ?? null,
							'contact' => $contactData['contact'] ?? null,
							'position' => $contactData['position'] ?? null,
						];
					}
						$property->other_contact_details = json_encode($otherContactDetails);
				}
				
				
		//dd($property);
			// Save the property to the database
		   $property->save();
		//    dd($property->id);
		   $getProperty=Properties::find($property->id);
		   $getProperty->amenities = json_decode($getProperty->amenities);
		   $getProperty->unit_details = json_decode($getProperty->unit_details);
		   $getProperty->other_industrial_fields = json_decode($getProperty->other_industrial_fields);
		   $getProperty->other_contact_details = json_decode($getProperty->other_contact_details);
			return response()->json(['status'=>200,'message' => $message, 'property' => $getProperty]);
		} catch (\Exception $e) {
			return response()->json(['status'=>500,'message' => 'Error', 'property' => $e]);

		}
    }
    // method for user logout and delete token
    public function profile()
    {
        return response()->json(["status"=> 200,
                        "message"=>"Profile Details",
                        "data"=> auth()->user()]);
    //    return auth()->user();
    }

   
}
