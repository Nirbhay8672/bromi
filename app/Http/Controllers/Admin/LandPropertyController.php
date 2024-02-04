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
			// Bharat Plot filter
			$indId = [];
			foreach ($dropdowns as $key => $value) {
				if ($value['name'] ==  'Plot' || $value['name'] ==  'Land') {
					if ($value['dropdown_for'] == 'property_specific_type') {
						$indId[] = $key;
					}
				}
			}
			$data = Properties::with('Projects', 'Locality', 'Village')
				->where('property_category', $indId[0])
				->orWhere('property_category', $indId[1])
				// Filter Section
				->when($request->filter_property_for && empty(Auth::user()->property_for_id), function ($query) use ($request) {
					return $query->where(function ($query) use ($request) {
						$query->where('properties.property_for', $request->filter_property_for)->orWhere('property_for', 'Both');
					});
				})
				->when($request->filter_property_type && empty(Auth::user()->property_type), function ($query) use ($request) {
					// dd($request->filter_property_type,"...",Auth::user()->property_type);
					return $query->where(function ($query) use ($request) {
						$query->where('properties.property_type', $request->filter_property_type);
					});
				})
				->when($request->filter_specific_type && empty(Auth::user()->property_category), function ($query) use ($request) {
					// dd($request->filter_specific_type,"...",Auth::user()->property_category);
					return $query->where(function ($query) use ($request) {
						$query->where('properties.property_category', $request->filter_specific_type);
					});
				})
				->when($request->filter_configuration && empty(Auth::user()->configuration), function ($query) use ($request) {
					// dd($request->filter_configuration,"...",Auth::user()->configuration);
					return $query->where(function ($query) use ($request) {
						$query->where('properties.configuration', $request->filter_configuration);
					});
				})
				->when($request->filter_district_id && empty(Auth::user()->district_id), function ($query) use ($request) {
					// dd($request->filter_district_id,"...",Auth::user()->district_id);
					return $query->where(function ($query) use ($request) {
						$query->where('properties.district_id', $request->filter_district_id);
					});
				})
				->when($request->filter_taluka_id && empty(Auth::user()->taluka_id), function ($query) use ($request) {
					// dd($request->filter_taluka_id,"...",Auth::user()->filter_taluka_id);
					return $query->where(function ($query) use ($request) {
						$query->where('properties.taluka_id', $request->filter_taluka_id);
					});
				})
				->when($request->filter_village_id && empty(Auth::user()->village_id), function ($query) use ($request) {
					// dd($request->filter_village_id,"...",Auth::user()->village_id);
					return $query->where(function ($query) use ($request) {
						$query->where('properties.village_id', $request->filter_village_id);
					});
				})
				->orderBy('id', 'desc')->get();
			return DataTables::of($data)
				->editColumn('project_id', function ($row) {
					if (isset($row->Projects->project_name) || isset($row->Village->name)) {
						$project_name =  '<td style="vertical-align:top">
										<font size="3"><a href="' . route('admin.project.view', encrypt($row->id)) . '" style="font-weight: bold;">' . (!empty($row->Projects->project_name) ? $row->Projects->project_name : $row->Village->name) . '</a>';
					} else {
						$project_name = 'N/A';
					}

					$first_middle = '';
					if (isset($row->Projects->is_prime) && $row->Projects->is_prime) {
						$first_middle = '<img style="height:24px" src="' . asset('assets/images/primeProperty.png') . '" alt="">';
					}
					if ($row->hot_property) {
						$first_middle = $first_middle . '<img style="height:24px" src="' . asset('assets/images/hotProperty.png') . '" alt="">';
					}
					$first_end = '</font>';
					// $second = '<br> <a href="' . $row->location_link . '" target="_blank"> <font size="2" style="font-style:italic">Locality: ' . ((!empty($row->Projects->Area->name)) ? $row->Projects->Area->name : 'Null') . '	</font> </a>';
					$locality = (!empty($row->Projects->Area->name) ? '<br>Locality: ' . ((!empty($row->Projects->Area->name)) ? $row->Projects->Area->name : 'Null') . '	</font>' : "");
					$location_link = (!empty($row->location_link) ? '<br> <a href="' . $row->location_link . '" target="_blank"><i class="fa fa-map-marker fa-1x cursor-pointer color-code-popover" data-bs-trigger="hover focus">  check on map  </i></a>' : "");
					// $location_link = '<br> <font size="2" style="font-style:italic">Added On: ' . Carbon::parse($row->created_at)->format('d-m-Y') . '</font>';
					$last = 	'</td>';
					'</td>';
					return $project_name . $first_middle . $first_end . $locality . $location_link . $last;

					return '';
				})
				->editColumn('property_category', function ($row) use ($dropdowns) {
					// $new_array = array('', 'office space', 'Co-working', 'Ground floor', '1st floor', '2nd floor', '3rd floor', 'Warehouse', 'Cold Storage', 'ind. shed', 'Commercial Land', 'Agricultural/Farm Land', 'Industrial Land', '1 rk', '1bhk', '2bhk', '3bhk', '4bhk', '4+bhk');
					$new_array = array('', 'office space', 'Co-working', 'Ground floor', '1st floor', '2nd floor', '3rd floor', 'Warehouse', 'Cold Storage', 'ind. shed', 'Commercial Land', 'Agricultural/Farm Land', 'Industrial Land', '1 rk', '1bhk', '2bhk', '3bhk', '4bhk', '4+bhk', 'Test', 'testw');
					if ($row->property_for == 'Both') {
						$forr = 'Rent & Sell';
					} else {
						$forr = $row->property_for;
					}
					$sub_cat = ((!empty($dropdowns[$row->property_category]['name'])) ? ' | ' . $dropdowns[$row->property_category]['name'] : '');

					if (!is_null($row->configuration)) {
						$catId = (int)$row->configuration;
						// dd("cat id :",$catId);
						//$getsub_category = Helper::getsubcategory($catId);
						$getsub_category = $new_array[$catId];
						// dd($getsub_category);

						// dd($catId,$getsub_category);
						if (!is_null($getsub_category)) {
							$sub_cat = ' | ' . $getsub_category;
							if ($sub_cat == " | Agricultural/Farm Land") {
								$sub_cat = " | Agricultural";
							}
						}
					}
					//$category = ((!empty($dropdowns[$row->property_category]['name'])) ? ' | '. $dropdowns[$row->property_category]['name'] : '');
					$category = $sub_cat;
					// BHARAT HIDE FURNISHED
					// dd($row->property_category,"fr");
					// if ($row->property_category == '256') {
					// 	$fstatus  = '';
					// } else {
					// 	$fstatus  = 'Unfurnished';
					// 	if (!empty($row->unit_details) && !empty(json_decode($row->unit_details)[0])) {
					// 		$vv = json_decode($row->unit_details);
					// 		if (isset($vv[0][8])) {
					// 			if (!empty($vv[0][8])) {
					// 				if ($vv[0][8] == "106" || $vv[0][8] == "34") {
					// 					$fstatus = 'Furnished';
					// 				} elseif ($vv[0][8] == "107" || $vv[0][8] == "35") {
					// 					$fstatus = 'Semi Furnished';
					// 				} elseif ($vv[0][8] == "108" || $vv[0][8] == "36") {
					// 					$fstatus = 'Unfurnished';
					// 				} else {
					// 					$fstatus = 'Can Furnished';
					// 				}
					// 			}
					// 		}
					// 	}
					// }

					$salable_area_print = $this->generateLandAreaDetails($row, $dropdowns[$row->property_category]['name'], $dropdowns);

					if (empty($salable_area_print)) {
						$salable_area_print = "Area Not Available";
					}

					try {
						return '
						<td style="vertical-align:top">
						' . ((!empty($forr)) ?  $forr : '')  . $category . '
						<font size="2" style="font-style:italic">
						<br>
						' . $salable_area_print . '
						</font>
						</td>';
					} catch (\Throwable $th) {
						dd($th);
					}
				})
				->editColumn('details', function ($row) {
					if (isset($row->survey_number) || isset($row->tp_number) || isset($row->fp_number)) {
						$s_number = (!empty($row->survey_number) ? '<br>S No: ' . $row->survey_number : "");
						$t_number = (!empty($row->tp_number) ? '<br>T No: ' . $row->tp_number : "");
						$f_number = (!empty($row->fp_number) ? '<br>F No: ' . $row->fp_number : "");
					} else {
						$s_number = '';
						$t_number = '-';
						$f_number = '';
					}
					return $s_number . $t_number . $f_number;
				})
				->editColumn('price', function ($row) {
					$all_units = [];
					if (!empty($row->unit_details) && !empty(json_decode($row->unit_details)[0])) {
						$vv = json_decode($row->unit_details);
						$all_units_length = count($all_units);
						foreach ($vv as $key => $value) {
							$price = '';
							if ($row->property_for === 'Both') {
								if (!empty($value['7']) && !empty($value['4'])) {
									$price = '  R : ' . $value['4'] . '<br>' . '  S : ' . $value['7'];
								} elseif (!empty($value['3']) && !empty($value['4'])) {
									$price = '  R : ' .  $value['4'] . '<br>' . '  S : ' . $value['3'];
								}
							} else {
								$r_price = !empty($value['4']) ? '  R : ' . $value['4'] : null;
								$s_price = !empty($row->survey_price) ? '  S : ' . $row->survey_price : null;
								$t_price = !empty($row->fp_plot_price) ? '  T :' . $row->fp_plot_price : null;
								$price = implode('<br>', array_filter([$r_price, $s_price, $t_price]));
							}
							$data = [];
							$data[0] = $value[0];
							$data[1] = $value[1];
							$data[2] = $price;
							array_push($all_units, $data);
						}
					}

					if (!empty($all_units)) {
						$vvv = '';
						$unit_wing = '';
						$all_units_length = count($all_units);
						if ($all_units_length > 2) {
							foreach ($all_units as $key => $value) {
								$vvv = $vvv . '<br> ' . ((!empty($value[0])) ? $value[0] . '-' : '') . '' . $value[1];
								$vvv = $vvv . ' - ' . ((!empty($value[2])) ? $value[2] : '');
							}
							$second = '' . ((!empty($all_units[0][2])) ? $all_units[0][2]  : '')  .  ' <i class="fa ml-1 fa-info-circle cursor-pointer color-code-popover" data-container="body"  data-bs-content="' . $unit_wing . $vvv . '" data-bs-trigger="hover focus"></i>';
							return $second;
						} else {
							foreach ($all_units as $key => $value) {
								$vvv = $vvv .   ((!empty($value[2])) ? $value[2] . '<br>' : '');
							}
							return $vvv;
						}
					}
					return;
				})
				->editColumn('unit_details', function ($row) {
					$all_units = [];
					if (!empty($row->unit_details) && !empty(json_decode($row->unit_details)[0])) {
						$vv = json_decode($row->unit_details);
						foreach ($vv as $key => $value) {
							if ($value[2] == "Rent Out") {
								$all_units = ['Rent Out'];
							} else if ($value[2] == "Sold Out") {
								$all_units = ['Sold Out'];
							} else if ($row->property_for === 'Both') {
								$price = '';
								if (!empty($value['7'])) {
									$price = $value['7'];
								} else if (!empty($value['4'])) {
									$price = $value['4'];
								} else if (!empty($value['3'])) {
									$price = $value['3'];
								}
								$data = [];
								$data[0] = $value[0];
								$data[1] = $value[1];
								$data[2] = $price;
								array_push($all_units, $data);
							} else {
								$price = '';
								if (!empty($value['7'])) {
									$price = $value['7'];
								} else if (!empty($value['4'])) {
									$price = $value['4'];
								} else if (!empty($value['3'])) {
									$price = $value['3'];
								}
								$data = [];
								$data[0] = $value[0];
								$data[1] = $value[1];
								$data[2] = $price;
								array_push($all_units, $data);
							}
						}
					}
					if (!empty($all_units)) {
						$vvv = '';
						$all_units_length = count($all_units);
						if ($all_units_length > 2) {
							foreach ($all_units as $key => $value) {
								$vvv = $vvv . '<br> ' . ((!empty($value[0])) ? $value[0] . '-' : '') . '' . $value[1];
							}
							$second = '' . ((!empty($all_units[0][0])) ? $all_units[0][0] . '-' : '') . '' . $all_units[0][1] .  ' <i class="fa ml-1 fa-info-circle cursor-pointer color-code-popover" data-container="body"  data-bs-content="' . $vvv . '" data-bs-trigger="hover focus"></i>';
							return $second;
						} else {
							foreach ($all_units as $key => $value) {
								$vvv = $vvv .  ((!empty($value[0])) ? $value[0] . '-' : ' ') . ((!empty($value[1])) ? $value[1] . '<br>' : '');
							}
							return $vvv;
						}
					}
					return;
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
				->rawColumns(['project_id', 'details', 'property_category', 'unit_details', 'contact_details', 'price', 'actions', 'select_checkbox'])
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
			// if (($value['name'] == 'Plot' || $value['name'] ==  'Land') && str_contains($value['dropdown_for'], 'property_')) {
			// 	array_push($prop_type, $value['id']);
			// }
			if (($value['name'] == 'Commercial' || $value['name'] == 'Residential') && str_contains($value['dropdown_for'], 'property_')) {
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

	public function generateLandAreaDetails($row, $type, $dropdowns)
	{
		$area = '';
		$measure = '';

		if ($type == 'Office' || $type == 'Retail' || $type == 'Flat' || $type == 'Penthouse' || $type == 'Plot') {
			$area = explode('_-||-_', $row->salable_area)[0];
			$measure = explode('_-||-_', $row->salable_area)[1];
		} elseif ($type == 'Storage/industrial') {
			$area = explode('_-||-_', $row->salable_plot_area)[0];
			$measure = explode('_-||-_', $row->salable_plot_area)[1];
		} elseif ($type == 'Vila/Bunglow') {
			$salable = explode('_-||-_', $row->salable_plot_area)[0];
			$constructed = explode('_-||-_', $row->constructed_salable_area)[0];
			$measure = explode('_-||-_', $row->constructed_salable_area)[1];
			if (empty($salable)) {
				$salable = '';
			}
			// $area = "C:" . $constructed . ' ' . $dropdowns[$measure]['name'] . ' - P: ' . $salable;
			$area = "P:" . $salable . ' - C: ' . $constructed;
		} elseif ($type == 'Farmhouse') {
			$area = explode('_-||-_', $row->salable_plot_area)[0];
			$measure = explode('_-||-_', $row->salable_plot_area)[1];
		}

		if (!empty($area) && !empty($measure)) {
			$formattedArea = $area . ' ' . $dropdowns[$measure]['name'];
			return $formattedArea;
		} else {
			return "Area Not Available";
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
		$construction_documents = $request->file('construction_docs');
		$documents = $request->file('documents');

		if (!empty($construction_documents)) {
			foreach ($construction_documents as $key => $constDocs) {
				$ext = $constDocs->getClientOriginalExtension();
				$fileName = str_replace('.' . $ext, '', $constDocs->getClientOriginalName()) . "-" . time() . '.' . $ext;
				$fileName = str_replace('#', '', $fileName);
				$path = public_path() . config('constant.land_images_url');
				File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
				$moved = $constDocs->move($path, $fileName);

				if ($moved) {
					$land_image = new LandImages();
					$land_image->land_id = $landId;
					$land_image->construction_documents = $fileName;
					$land_image->user_id = Auth::user()->id;
					$land_image->pro_id = $proId;
					$land_image->save();
				}
			}
		}
		if ((!empty($images) && is_array($images)) || (!empty($documents) && is_array($documents))) {
			if (!empty($images)) {
				foreach ($images as $key => $image) {
					$ext = $image->getClientOriginalExtension();
					$fileName = str_replace('.' . $ext, '', $image->getClientOriginalName()) . "-" . time() . '.' . $ext;
					$fileName = str_replace('#', '', $fileName);
					$path = public_path() . config('constant.land_images_url');
					File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
					$moved = $image->move($path, $fileName);
					if ($moved) {
						$land_image = new LandImages();
						$land_image->land_id = $landId;
						$land_image->image = $fileName;
						$land_image->user_id = Auth::user()->id;
						$land_image->pro_id = $proId;
						$land_image->save();
					}
				}
			}
			if (!empty($documents)) {
				foreach ($documents as $key => $document) {
					// Process document files
					$ext = $document->getClientOriginalExtension();
					$fileName = str_replace('.' . $ext, '', $document->getClientOriginalName()) . "-" . time() . '.' . $ext;
					$fileName = str_replace('#', '', $fileName);
					$path = public_path() . config('constant.land_images_url'); // Use the same path as images
					File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
					$moved = $document->move($path, $fileName);
					if ($moved) {
						$land_image = new LandImages();
						$land_image->land_id = $landId;
						$land_image->image = $fileName;
						$land_image->user_id = Auth::user()->id;
						$land_image->pro_id = $proId;
						$land_image->save();
					}
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
