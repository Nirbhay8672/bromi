<?php

namespace App\Http\Controllers\Admin;

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

		if ($request->ajax()) {
			$dropdowns = DropdownSettings::get()->toArray();
			$dropdownsarr = [];
			foreach ($dropdowns as $key => $value) {
				$dropdownsarr[$value['id']] = $value;
			}
			$dropdowns = $dropdownsarr;
			$areas = Areas::where('user_id',Auth::user()->id)->get()->toArray();
			$areaarr = [];
			foreach ($areas as $key => $value) {
				$areaarr[$value['id']] = $value;
			}
			$areas = $areaarr;
			$pro = '';
			if (!empty($request->search_enq)) {
				$pro = Properties::find($request->search_enq);
			}
			//Get Data Enquiry
			$data = Enquiries::with('Employee', 'Progress', 'activeProgress')
				//Filter Enquiry
				->when($request->filter_by, function ($query) use ($request) {
					if ($request->filter_by == 'new') {
						return $query->doesntHave('Progress');
					} elseif ($request->filter_by == 'today') {
						return $query->whereHas('activeProgress', function ($query) {
							$query->whereDate('enquiries.created_at', '=', Carbon::now()->format('Y-m-d'));
						});
					} elseif ($request->filter_by == 'tomorrow') {
						return $query->whereHas('activeProgress', function ($query) {
							$query->whereDate('created_at', '=', Carbon::tomorrow()->format('Y-m-d'));
						});
					} elseif ($request->filter_by == 'yesterday') {
						return $query->whereHas('activeProgress', function ($query) {
							$query->whereDate('created_at', '=', Carbon::yesterday()->format('Y-m-d'));
						});
					} elseif ($request->filter_by == 'due') {
						return $query->whereHas('activeProgress', function ($query) {
							$query->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
						});
					} elseif ($request->filter_by == 'weekend') {
						return $query->whereHas('activeProgress', function ($query) {
							$query->whereDate('created_at', '<=', Carbon::now()->endOfWeek())->whereDate('created_at', '>=', Carbon::now()->endOfWeek()->subDay());;
						});
					}
				})
				->when($request->calendar_date && $request->calendar_type, function ($query) use ($request) {
					if ($request->calendar_type == 'New Enquiry') {
						return $query->whereDate('created_at', $request->calendar_date);
					} else {
						return $query->whereHas('activeProgress', function ($query) use ($request) {
							$query->whereDate('created_at', '=', $request->calendar_date)->where('progress', $request->calendar_type);
						});
					}
				})
				->when($request->filter_city_id, function ($query) use ($request) {
					return $query->where('enquiry_city_id', $request->filter_city_id);
				})
				->when($request->filter_enquiry_branch_id, function ($query) use ($request) {
					return $query->where('enquiry_branch_id', $request->filter_enquiry_branch_id);
				})
				->when($request->filter_employee_id, function ($query) use ($request) {
					return $query->where('employee_id', $request->filter_employee_id);
				})
				->when($request->filter_property_type, function ($query) use ($request) {
					// return $query->where('requirement_type', 'like', '%"' . $request->filter_property_type . '"%');
					return $query->where('requirement_type', $request->filter_property_type);
				})
				->when($request->filter_specific_type, function ($query) use ($request) {
					$query->where(function ($query) use ($request) {
						$types = json_decode($request->filter_specific_type);
						if (isset($types[0])) {
							foreach ($types as $key => $value) {
								$query->orWhere('property_type', 'like', '%' . $value . '%');
							}
						}
					});
				})
				->when($request->filter_configuration, function ($query) use ($request) {
					return  $query->where('configuration', 'like', '%"' . $request->filter_configuration . '"%');
				})
				->when($request->filter_area_id, function ($query) use ($request) {
					$query->where(function ($query) use ($request) {
						$types = json_decode($request->filter_area_id);
						if (isset($types[0])) {
							foreach ($types as $key => $value) {
								$query->orWhere('area_ids', 'like', '%' . $value . '%');
							}
						}
					});
				})
				->when($request->filter_enquiry_for, function ($query) use ($request) {
					return $query->where('enquiry_for', $request->filter_enquiry_for);
				})
				->when($request->filter_enquiry_source, function ($query) use ($request) {
					return $query->where('enquiry_source', $request->filter_enquiry_source);
				})
				->when($request->filter_enquiry_progress, function ($query) use ($request) {
					return $query->whereHas('activeProgress', function ($query) use ($request) {
						$query->where('progress', $request->filter_enquiry_progress);
					});
				})
				->when($request->filter_enquiry_status, function ($query) use ($request) {
					return $query->where('enquiry_status', $request->filter_enquiry_status);
				})
				->when($request->filter_sales_comment, function ($query) use ($request) {
					return $query->whereHas('activeProgress', function ($query) use ($request) {
						$query->where('sales_comment_id', $request->filter_sales_comment);
					});
				})
				->when($request->filter_lead_type, function ($query) use ($request) {
					return $query->whereHas('activeProgress', function ($query) use ($request) {
						$query->where('lead_type', $request->filter_lead_type);
					});
				})
				->when($request->filter_purpose, function ($query) use ($request) {
					return $query->where('purpose', $request->filter_purpose);
				})
				->when($request->filter_nfd_from, function ($query) use ($request) {
					return $query->whereHas('activeProgress', function ($query) use ($request) {
						$query->whereDate('nfd', '>=', $request->filter_nfd_from);
					});
				})
				->when($request->filter_nfd_to, function ($query) use ($request) {
					return $query->whereHas('activeProgress', function ($query) use ($request) {
						$query->whereDate('nfd', '>=', $request->filter_nfd_to);
					});
				})
				->when($request->filter_from_date, function ($query) use ($request) {
					return $query->whereDate('created_at', '>=', $request->filter_from_date);
				})
				->when($request->filter_to_date, function ($query) use ($request) {
					return $query->whereDate('created_at', '<=', $request->filter_to_date);
				})
				->when($request->filter_favourite, function ($query) use ($request) {
					return $query->where('is_favourite', $request->filter_favourite);
				})
				->when($request->filter_new_enquiry, function ($query) use ($request) {
					return $query->doesntHave('activeProgress');
				})
				->when($request->filter_draft, function ($query) use ($request) {
					return $query->whereDate('created_at', '<=', $request->filter_draft);
				})
				->when($request->filter_prospect, function ($query) use ($request) {
					return $query->whereDate('created_at', '<=', $request->filter_prospect);
				})
				//Matching Enquiry
				->when(!empty($request->search_enq), function ($query) use ($request, $pro) {
					if (!empty($pro)) {
						// prop type = enq type req type
						if ($request->match_property_type) {
							// dd("requirement_type", $pro->property_type, "..", $request->match_property_type);
							$query->where('requirement_type',   $pro->property_type);
						}

						//prop category = enq category
						if ($request->match_specific_type) {
							// dd("property_type", $request->match_specific_type, "..", $pro->property_category);
							$query->where('property_type',   $pro->property_category);
						}

						if ($request->match_specific_sub_type) {
							// dd("property_sub_type", $request->match_specific_sub_type, ".Conf.", $pro->configuration);
							$query->whereJsonContains('configuration', ($pro->configuration));
						}

						// Property For = Enquiry for
						if ($request->match_enquiry_for) {
							// dd("match_enquiry_for", $enquiry_for);
							$enquiry_for = ($pro->property_for == 'Sell') ? 'Buy' : $pro->property_for;
							$query->where('enquiry_for', $enquiry_for);
						}

						// budget from - budget to
						if ($request->match_budget_from_type) {
							// dd("match_budget_from_type", $request->match_budget_from_type, "..", $pro->survey_price, "...", $unit_price);
							$value = $pro->survey_price; // Get the value from the request
							$unitDetails = json_decode($pro->unit_details, true);
							$unit_price = $unitDetails[0][7];
							if ($value != '') {
								$query->where('budget_from', '<=', $pro->survey_price)
									->where('budget_to', '>=', $pro->survey_price);
							} else if ($unit_price != '') {
								$query->where('budget_from', '<=', $unit_price)
									->where('budget_to', '>=', $unit_price);
							}
						}

						// Advertise Prop =  sorce enq
						if ($request->match_inquiry_source) {
							// dd("enquiry_source ALL", $request->all());
							// dd("enquiry_source", $request->match_inquiry_source, "...", $pro->source_of_property);
							$query->where('enquiry_source', $pro->source_of_property);
						}

						// size range = prop salable area
						if ($request->match_enquiry_size) {
							// dd("match_enquiry_size ==>", $request->match_enquiry_size, "..", $pro->salable_area, "..", $pro->constructed_salable_area);
							$parts = explode("_-||-_", $pro->salable_area);
							$result = $parts[0];
							$area_size_from = str_replace(',', '', $result);
							$area_size_to = str_replace(',', '', $result);

							// dd($result);
							$parts = explode("_-||-_", $pro->constructed_salable_area);
							$result2 = $parts[0];
							$area_from = str_replace(',', '', $result2);
							$area_to = str_replace(',', '', $result2);

							if ($area_size_from != '' && $area_size_to != '') {
								$query->where('area_from', '<=', $area_size_from)
									->where('area_to', '>=', $area_size_to);
							} else if ($area_from != '' && $area_to != '') {
								$query->where('area_from', '<=', $area_from)
									->where('area_to', '>=', $area_to);
							}
						}

						// prop building id == enq build id
						// if ($request->match_building) {
						// 	dd("building_id:", $request->match_building);
						// 	return $query->where('building_id', 'like', '%"' . $pro->project_id . '"%');
						// }
					}
				})
				->orderBy('id', 'desc');

				$parts = explode('?', $request->location);

				if (count($parts) > 1) {
					$value = $parts[1];
					$value = trim($value);

					if (strpos($value, 'data_id') !== false) {
						$value_part = explode('=', $value);
						if($value_part[1] > 0) {
							$data->where('id', $value_part[1]);
						}
					}
				}

			foreach ($data->get() as $key => $value) {
				if (!empty($request->filter_from_budget)) {
					if (empty($value->budget_from)) {
						unset($data[$key]);
					}
					if (!(Helper::c_to_n($value->budget_from) >= Helper::c_to_n($request->filter_from_budget))) {
						unset($data[$key]);
					}
				}
				if (!empty($request->filter_to_budget)) {
					if (empty($value->budget_to)) {
						unset($data[$key]);
					}
					if (!(Helper::c_to_n($value->budget_to) <= Helper::c_to_n($request->filter_to_budget))) {
						unset($data[$key]);
					}
				}
			}

			return DataTables::of($data)
				->editColumn('client_name', function ($row) use ($dropdownsarr) {

					$lead_type = '';
					$pro = 'New Lead';
					if (isset($row->activeProgress)) {
						$pro1 = $row->activeProgress;
						$pro = $pro1->progress;
						if (!empty($pro1->lead_type)) {
							if (str_contains(strtolower($pro1->lead_type), 'warm')) {
								$leadd = 'warm';
							} elseif (str_contains(strtolower($pro1->lead_type), 'cold')) {
								$leadd = 'cold';
							} else {
								$leadd = 'hot';
							}
							$lead_type = '<img style="height:24px" src="' . asset('assets/images/' . $leadd . '-lead.png') . '" alt="">';
						}
					}


					$first = '<td align="center" style="vertical-align:top"><b><a href="' . route('admin.view.enquiry', encrypt($row->id)) . '"> ' . $row->client_name . '</a></b>' . $lead_type . ' <br><a href="tel:' . $row->client_mobile . '">' . $row->client_mobile . '</a>';


					$s_1 = 'border-bottom:10px solid #1d2848 !important';
					$title = $pro;
					if (isset($dropdownsarr[$pro])) {
						$s_1 = 'border-bottom:10px solid ' . (isset(explode('___', $dropdownsarr[$pro]['name'])[1]) ? explode('___', $dropdownsarr[$pro]['name'])[1] : "") . ' !important';
						$title = (isset(explode('___', $dropdownsarr[$pro]['name'])[0]) ? explode('___', $dropdownsarr[$pro]['name'])[0] : "");
					}
					if ($pro == 'Lead Confirmed') {
						$s_1 = 'border-bottom:10px solid #ff7e00 !important';
					} elseif ($pro == 'Site Visit Scheduled') {
						$s_1 = 'border-bottom:10px solid #a200ff !important';
					} elseif ($pro == 'Site Visit Completed') {
						$s_1 = 'border-bottom:10px solid #fff600 !important';
					} elseif ($pro == 'Discussion') {
						$s_1 = 'border-bottom:10px solid #00f0ff !important';
					} elseif ($pro == 'Booked') {
						$s_1 = 'border-bottom:10px solid #0d8c07 !important';
					} elseif ($pro == 'Lost') {
						$s_1 = 'border-bottom:10px solid #ff2a75 !important';
					} else {
						$title = "New Lead";
					}


					$second = '<div><div class="row mx-0 align-items-center"><div data-bs-content="' . $title . '" data-bs-original-title="" data-bs-trigger="hover" data-container="body" data-bs-toggle="popover" data-bs-placement="bottom" style="' . $s_1 . '" class="py-0 px-0 d-block col-8"></div> <div class="col-2"><i class="fa fa-info-circle cursor-pointer color-code-popover" data-container="body"  data-bs-content="&nbsp;" data-bs-trigger="hover focus"></i></div></div></div>';
					$end = '</td>';

					// $second = '<div><div class="row mx-0 align-items-center"><div title="'.$title.'" data-toggle="tooltip" data-bs-html="true"  style="' . $s_1 . '" class="py-0 px-0 d-block col-8"></div> <div class="col-2"><i class="fa fa-info-circle color-code-popover" data-bs-content="" data-bs-trigger="hover focus"></i></div></div></div>';
					return $first . $second . $end;
				})
				->editColumn('client_requirement', function ($row) use ($dropdowns, $areas) {
					try {
						$area_name = '';
						$configuration_name = '';
						$requiretype_name = '';
						$configurationArray = json_decode($row->configuration);

						// if (!empty(config('constant.property_configuration')[$row->configuration])) {
						// 	$configuration_name = config('constant.property_configuration')[$row->configuration];
						// 	dd($configuration_name);

						$sub_cat = ((!empty($dropdowns[$row->property_type]['name'])) ? ' | ' . $dropdowns[$row->property_type]['name'] : '');

						$configurationArray = json_decode($row->configuration);
						if (!empty($configurationArray) && isset($configurationArray[0])) {
							$configurationKey = $configurationArray[0];

							if (!empty(config('constant.property_configuration')[$configurationKey])) {
								$configuration_name = config('constant.property_configuration')[$configurationKey];
							} else {
								$configuration_name = "Null";
							}
						} else {
							$category = $sub_cat;
						}

						$category = $sub_cat;

						$area_name = '';
						$other_areas = '';
						$area_title = '';
						if (!empty($row->area_ids)) {
							foreach (json_decode($row->area_ids) as $key => $value) {
								if ($key < 2) {
									if ($key > 0) {
										$area_name .= ', ' . (!empty($areas[$value]['name']) ? $areas[$value]['name'] : '');
									} else {
										$area_name .= (!empty($areas[$value]['name']) ? $areas[$value]['name'] : '');
									}
								} else {
									$other_areas .= $area_name;
									$other_areas .= ', ' . (!empty($areas[$value]['name']) ? $areas[$value]['name'] : '');
								}
							}
						}
						if ($other_areas) {
							$area_title = ' <i class="fa fa-info-circle cursor-pointer" data-bs-content="' . $other_areas . '" data-bs-original-title="" data-bs-trigger="hover" data-container="body" data-bs-toggle="popover" data-bs-placement="bottom"></i>';
						}
						$area_form_m = '';
						if (!empty($row->area_from_measurement)) {
							$area_form_m = $dropdowns[$row->area_from_measurement]['name'];
						}
						$area_form_t = '';
						if (!empty($row->area_to_measurement)) {
							$area_form_t = $dropdowns[$row->area_to_measurement]['name'];
						}

						if ($row->property_type == '256') {
							$fstatus  = '';
						} else {
							$fstatus  = 'Unfurnished';
							if (!empty($row->furnished_status) && !empty(json_decode($row->furnished_status))) {
								$vv = json_decode($row->furnished_status);
								if (isset($vv[0])) {
									if (!empty($vv[0])) {
										if ($vv[0] == "106" || $vv[0] == "34") {
											$fstatus = 'Furnished';
										} elseif ($vv[0] == "107" || $vv[0] == "35") {
											$fstatus = 'Semi Furnished';
										} elseif ($vv[0] == "108" || $vv[0] == "36") {
											$fstatus = 'Unfurnished';
										} else {
											$fstatus = 'Can Furnished';
										}
									}
								}
							}
						}

						$req = '<div class="mb-1">' . $row->enquiry_for . ((!empty($row->enquiry_for) && !empty($configuration_name)) ? ' | ' : $category) . $configuration_name . '</div>';
						//	$req .= '<div class="mb-1">' . ((!empty($row->area_from) && !empty($row->area_to)) ? $row->area_from . " " . $area_form_m . " - " . $row->area_to . " " . $area_form_t : "") . '</div>';
						$req .= '<div class="mb-1">' . ((!empty($row->area_from) && !empty($row->area_to)) ? $row->area_from . " - " . $row->area_to . " " . $area_form_t : "") . '</div>';
						$req .= '<div class="mb-1"><small style="font-style:italic; font-size:89% !important"></small></div>';
						$req .= $fstatus;
						if (!empty($area_name)) {
							$req .= '<div class="mb-1"><small style="font-style:italic; font-size:89% !important"><i class="fa fa-map-marker"></i> ' . $area_name . $area_title . '</small></div>';
						}
						return $req;
					} catch (\Throwable $th) {
						report($th);
					}
				})
				->editColumn('budget', function ($row) {
					$bud = '';
					$row->budget_from = trim($row->budget_from);
					$row->budget_to = trim($row->budget_to);
					if (!empty($row->budget_from) || !empty($row->budget_to)) {
						$bud = '<td style="vertical-align:top">
					' . ((!empty($row->budget_from)) ? $row->budget_from . " to " : " upto ")  . $row->budget_to . '
					</td>';
					}
					return $bud;
				})->editColumn('telephonic_discussion', function ($row) {
					if (isset($row->activeProgress)) {
						$pro = $row->activeProgress;
						$remark_data = "";
						if (!empty($pro->remarks)) {
							$remark_data = $pro->remarks;
						}
						return '<small style="font-style:italic; font-size:89% !important"><b></b>' . Carbon::parse($pro->nfd)->format('d-m-Y g:i A') . '<br>' . $remark_data . '</small>';
					}
					return $row->telephonic_discussion;
				})
				//transfer date
				->editColumn('assigned_to', function ($row) {
					if (!empty($row->Employee)) {
						return '<td align="center" style="vertical-align:top">
					' . $row->Employee->first_name . ' ' . $row->Employee->last_name . ' <br>
					' . Carbon::parse($row->transfer_date)->format('d-m-Y') .  '</td>';
						// ' . Carbon::parse($row->created_at)->format('Y-m-d').  '</td>';
					};
				})
				->editColumn('status_change', function ($row) {
					$ischecked = $row->enquiry_status;
					$status =
						'<div class="d-flex align-items-center mb-3 col-md-2">
						<div class="form-group">
							<label class="switch mb-0">
								<input type="checkbox" class="changeTheStatus"  data-id="' . $row->id . '" ' . (($ischecked) ? 'checked' : '') . ' ><span class="switch-state"></span>
							</label>
						</div>
					</div>';
					return $status;
				})
				->editColumn('select_checkbox', function ($row) {
					$abc = '<div class="form-check checkbox checkbox-primary mb-0">
					<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
					<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  	</div>';
					return $abc;
				})
				->editColumn('Actions2', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<a href="' . route('admin.enquiry.edit', $row->id) . '"><i role="button" title="Edit" data-id="' . $row->id . '"  class="fs-22 py-2 mx-2 fa-pencil pointer fa  " type="button"></i></a>';

					$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteEnquiry(this) class="fs-22 py-2 mx-2 fa-trash pointer fa text-danger" type="button"></i>';

					$buttons =  $buttons . '<i title="Matching Property" data-id="' . $row->id . '" onclick=matchingProperty(this) class="fa fs-22 py-2 mx-2 fa-plane text-info"></i>';
					$buttons =  $buttons . '<i title="Progress" data-id="' . $row->id . '" onclick=showProgress(this) class="fa fs-22 py-2 mx-2 fa-bars text-warning"></i><br>';

					$buttons =  $buttons . '<i  title="Transfer Enqiry" data-employee="' . $row->employee_id . '"  data-id="' . $row->id . '" onclick=transferEnquiry(this) class="pointer fa fs-22 py-2 mx-2 fa-long-arrow-right text-dark"></i>';
					$buttons =  $buttons . '<i title="Contact List" data-id="' . $row->id . '" onclick=contactList(this) class="fa fs-22 py-2 mx-2 fa-database text-blue"></i>';
					$buttons =  $buttons . '<i title="Schedule Visit" data-employee="' . $row->employee_id . '" data-id="' . $row->id . '" onclick=showScheduleVisit(this) class="fa fs-22 py-2 mx-2 fa-map text-success"></i>';
					return $buttons;
				})
				->rawColumns(['select_checkbox', 'telephonic_discussion', 'client_name', 'client_requirement', 'budget', 'assigned_to', 'Actions', 'Actions2', 'status_change'])
				->make(true);
		}
		$prop_list = Helper::get_property_units_helper();
		$projects = Projects::orderBy('project_name')->get();
		$configuration_settings = DropdownSettings::get()->toArray();

		$prop_type = [];
		foreach ($configuration_settings as $key => $value) {
			if (($value['name'] == 'Commercial' || $value['name'] == 'Residential') && str_contains($value['dropdown_for'], 'property_')) {
				array_push($prop_type, $value['id']);
			}
		}


		$cities = City::orderBy('name')->get();
		$branches = Branches::orderBy('name')->get();
		$areas = Areas::where('user_id',Auth::user()->id)->orderBy('name')->get();
		$employees = User::where('parent_id', Session::get('parent_id'))->orWhere('id', Session::get('parent_id'))->get();


		return view('admin.enquiries.index', compact('projects', 'prop_type', 'branches', 'cities', 'areas', 'configuration_settings', 'employees', 'prop_list'));
	}

	public function changeEnquiryStatus(Request $request)
	{
		if ($request->ajax()) {
			if (isset($request->id)) {
				$vv = Enquiries::find($request->id);
				$vv->enquiry_status = $request->status;
				$vv->save();
			}
		}
	}

	public function saveComments(Request $request)
	{
		if ($request->ajax()) {
			if (isset($request->id) && !empty($request->comment)) {
				$vv = new EnquiryComments();
				$vv->comment = $request->comment;
				$vv->user_id = Auth::User()->id;
				$vv->enquiry_id = $request->id;
				$vv->save();
			}
		}
	}

	public function getComments(Request $request)
	{
		$comments = EnquiryComments::with('User')->where('enquiry_id', $request->id)->orderBy('id', 'DESC')->get()->toArray();
		foreach ($comments as $key => $value) {
			$value['created_at'] = Carbon::parse($value['created_at'])->format('d-m-Y');
			$comments[$key] = $value;
		}
		return json_encode($comments);
	}

	public function importEnquiryTemplate()
	{
		$spreadsheet = new Spreadsheet;

		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', "ClientName");
		$sheet->setCellValue('B1', "Mobile");
		$sheet->setCellValue('C1', "Email");
		$sheet->setCellValue('D1', "EnquiryFor");
		$sheet->setCellValue('E1', "RequirementType");
		$sheet->setCellValue('F1', "SpecificPropertyType");
		$sheet->setCellValue('G1', "Configuration1");
		$sheet->setCellValue('H1', "Configuration2");
		$sheet->setCellValue('I1', "Enquiry Source");
		$sheet->setCellValue('J1', "BudgetFrom");
		$sheet->setCellValue('K1', "BudgetTo");
		$sheet->setCellValue('L1', "AssingedTo");
		$sheet->setCellValue('M1', "Remarks");
		$sheet->setCellValue('N1', "Created On");
		$sheet->setCellValue('O1', "Status");
		$sheet->setCellValue('P1', "Enquiry Progress");

		$vvells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'];
		foreach ($vvells as $key => $value) {
			$spreadsheet->getActiveSheet()->getColumnDimension($value)->setWidth(15);
		}

		$dd2 = User::where('parent_id', Session::get('parent_id'))->orWhere('id', Session::get('parent_id'))->get()->toArray();
		$users = [];
		foreach ($dd2 as $key => $value) {
			$users[] = $value['first_name'] . ' ' . $value['last_name'];
		}
		$users = '"' . implode(",", $users) . '"';

		$dropdowns = DropdownSettings::get()->toArray();
		$dropdownsarr = [];
		foreach ($dropdowns as $key => $value) {
			$dropdownsarr[$value['dropdown_for']][] = $value['name'];
		}

		$property_configuration = [];
		foreach (config('constant.property_configuration') as $key => $value) {
			array_push($property_configuration, $value);
		}



		$enquiryFor = '"Rent, Buy,Both"';
		$PropertyType = '"' . implode(",", $dropdownsarr['property_construction_type']) . '"';
		$specificType = '"' . implode(",", $dropdownsarr['property_specific_type']) . '"';
		$planType = '"' . implode(",", $property_configuration) . '"';
		$enquirySource = '"' . implode(",", $dropdownsarr['property_source']) . '"';

		$progress = '"Lead Confirmed,Site Visit Scheduled,Site Visit Completed,Discussion,Booked,Lost"';
		$propertyStatus = '"Active,In Active"';
		$arrr = [];
		$arrr['vals'] = [$enquiryFor, $PropertyType, $specificType, $planType, $planType, $enquirySource, $users, $propertyStatus, $progress];
		$arrr['sheetcell'] = ['D1', 'E1', 'F1', 'G1', 'H1', 'I1',  'L1', 'O1', 'P1'];
		$arrr['setsqref'] = ['D2:D1048576', 'E2:E1048576', 'F2:F1048576', 'G2:G1048576', 'H2:H1048576', 'I2:I1048576',  'L2:L1048576', 'O2:O1048576', 'P2:P1048576'];
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
		$writer->save(public_path('imports/enquiry_sample.xlsx'));
		return redirect(asset('imports/enquiry_sample.xlsx'));
	}

	public function exportEnquiry(Request $request)
	{
		$dropdowns = DropdownSettings::get()->toArray();
		$dropdownsarr = [];
		foreach ($dropdowns as $key => $value) {
			$dropdownsarr[$value['id']] = $value;
		}
		$dropdowns = $dropdownsarr;

		$enqs = [];
		$data = Enquiries::with('Employee', 'activeProgress')->get()->toArray();
		foreach ($data as $key => $value) {

			$arr = [];
			$prop_type = [];
			$area_name = [];
			if (!empty($value['property_type']) && !empty($dropdowns[$value['property_type']]['name'])) {
				$prop_type = $dropdowns[$value['property_type']]['name'];
			}

			$areas = Areas::where('user_id',Auth::user()->id)->get()->toArray();
			$areaarr = [];
			foreach ($areas as $key3 => $value2) {
				$areaarr[$value2['id']] = $value2;
			}
			$areas = $areaarr;

			if (!empty($value['area_ids']) && !empty(json_decode($value['area_ids']))) {
				foreach (json_decode($value['area_ids']) as $key1 => $value1) {
					$area = FacadesDB::table('areas')
						->where('id', $value1)->first();
					array_push($area_name, $area->name);
				}
			}
			$progress = '';
			$nfd = '';
			$remarks = $value['telephonic_discussion'];
			if (!empty($value['active_progress'])) {
				$pro = $value['active_progress'];
				$progress = $pro['progress'];
				if (!empty($pro['remarks'])) {
					$remarks = $pro['remarks'];
				}
				if (!empty($pro['nfd'])) {
					$nfd = Carbon::parse($pro['nfd'])->format('d-m-Y');;
				}
			}

			$arr['Client Name'] = $value['client_name'];
			$arr['Mobile'] = $value['client_mobile'];
			$arr['Email'] = $value['client_email'];
			$arr['Enquiry For'] = $value['enquiry_for'];
			if (!empty($prop_type)) {
				$arr['Property Type'] =  $prop_type;
			} else {
				$arr['Property Type'] = "";
			}
			$arr['Assigned To'] = ((!empty($value['employee'])) ? $value['employee']['first_name'] . ' ' . $value['employee']['last_name'] : '');
			$arr['Created Date'] = Carbon::parse($value['created_at'])->format('d-m-Y');
			$arr['Enquiry Progress'] = $progress;
			$arr['Budget'] = $value['budget_to'];
			$arr['NFD'] = $nfd;
			$arr['Remarks'] = $remarks;
			$arr['Favourite'] = (($value['is_favourite']) ? 'Yes' : 'No');
			$arr['Area'] = implode('/', $area_name);
			array_push($enqs, $arr);
		}
		$time = time() . Session::get('parent_id');
		File::isDirectory(public_path('excel')) or File::makeDirectory(public_path('excel'), 0777, true, true);
		(new FastExcel(collect($enqs)))->export(public_path('excel/' . $time . '_file.xlsx'));

		echo asset('excel/' . $time . '_file.xlsx');
	}

	public function saveProgress(Request $request)
	{
		// dd("saveProgress", $request->all());
		$previous = EnquiryProgress::where('enquiry_id', $request->enquiry_id)->where('status', 1)->first();
		EnquiryProgress::where('enquiry_id', $request->enquiry_id)->where('status', 1)->update(['status' => 0]);
		$data =  new EnquiryProgress();
		$data->enquiry_id = $request->enquiry_id;
		$data->user_id = Auth::user()->id;
		$data->progress = $request->progress;
		$data->lead_type = $request->lead_type;
		if (empty($request->progress)  && !empty($previous->progress)) {
			$data->progress = $previous->progress;
		}
		if (empty($request->lead_type) && !empty($previous->lead_type)) {
			$data->lead_type = $previous->lead_type;
		}
		$data->sales_comment_id = $request->sales_comment_id;
		if (!empty($request->nfd)) {
			$date = Carbon::parse($request->nfd)->format('Y-m-d H:i:s');
			$data->nfd = $date;
		}
		$data->remarks = $request->remarks;
		$data->save();
	}

	public function saveSchedule(Request $request)
	{
		// bhrt
		$previous = QuickSiteVisit::where('enquiry_id', $request->enquiry_id)->where('status', 1)->first();
		QuickSiteVisit::where('enquiry_id', $request->enquiry_id)->where('status', 1)->update(['status' => 0]);
		$data =  new QuickSiteVisit();
		$data->enquiry_id = $request->enquiry_id;
		$data->assigned_by = Auth::user()->id;
		$data->assigned_to = $request->assigned_to;
		$data->visit_status = $request->visit_status;
		$data->schedule_remind = $request->time_before;
		$data->email_reminder = $request->email_reminder;
		$data->sms_reminder = $request->sms_reminder;
		$data->property_list = $request->property_list;
		if (!empty($request->visit_date)) {
			$date = Carbon::parse($request->visit_date)->format('Y-m-d H:i:s');
			$data->visit_date = $date;
		} else {
			$data->visit_date = $previous->visit_date;
		}
		$data->description = $request->description;
		$data->save();

		if ($request->visit_status == 'Confirmed' || $request->visit_status == 'Completed') {
			if ($request->visit_status == 'Confirmed') {
				$the_progress = 'Site Visit Scheduled';
			} else {
				$the_progress = 'Site Visit Completed';
			}
			$previous = EnquiryProgress::where('enquiry_id', $request->enquiry_id)->where('status', 1)->first();
			EnquiryProgress::where('enquiry_id', $request->enquiry_id)->where('status', 1)->update(['status' => 0]);
			$data =  new EnquiryProgress();
			$data->enquiry_id = $request->enquiry_id;
			$data->user_id = Auth::user()->id;
			$data->progress = $the_progress;
			// $data->lead_type = $previous->lead_type;
			$data->nfd = $request->visit_date;

			$data->save();
		}
	}
	public function enquiryCalendar(Request $request)
	{
		// calendar bhrt
		if ($request->ajax()) {
			if (empty($request->month)) {
				$request->month = Carbon::now()->month;
			}
			if (empty($request->year)) {
				$request->year = Carbon::now()->year;
			}
			$arr = [];
			$events = [];
			$type_array = [];
			if ($request->newe) {
				$ar = [];
				$newenq = Enquiries::when($request->month, function ($query) use ($request) {
					return $query->whereMonth('created_at', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('created_at', '=', $request->year);
				})->get();
				foreach ($newenq as $key => $value) {
					array_push($ar, Carbon::parse($value->created_at)->format('Y-m-d'));
				}
				$arr['new_enquiry'] = array_count_values($ar);
				$type_array[] = 'new_enquiry';
			}
			// Lead Confirm
			if ($request->leadConf) {
				$ar = [];
				$lead_conf = EnquiryProgress::whereHas('Enquiry')->where('status', 1)->where('progress', '=', 'Lead Confirmed')->when($request->month, function ($query) use ($request) {
					return $query->whereMonth('created_at', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('created_at', '=', $request->year);
				})->get();

				foreach ($lead_conf as $key => $value) {
					array_push($ar, Carbon::parse($value->nfd)->format('Y-m-d'));
				}
				$arr['leadConf'] = array_count_values($ar);
				$type_array[] = 'leadConf';
			}
			// Site Visit
			if ($request->sitecomp) {
				$ar = [];
				$sitevisit = EnquiryProgress::whereHas('Enquiry')->where('status', 1)->where('progress', '=', 'Site Visit Scheduled')->whereNotNull('nfd')->when($request->month, function ($query) use ($request) {
					return $query->whereMonth('nfd', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('nfd', '=', $request->year);
				})->get();

				foreach ($sitevisit as $key => $value) {
					array_push($ar, Carbon::parse($value->nfd)->format('Y-m-d'));
				}
				$arr['site_visit_scheduled'] = array_count_values($ar);
				$type_array[] = 'site_visit_scheduled';
				// dd($arr['site_visit_scheduled'], "arr1");
			}

			// Site Completed
			if ($request->sitecomp) {
				$ar = [];
				$sitecomp = EnquiryProgress::whereHas('Enquiry')->where('status', 1)->where('progress', '=', 'Site Visit Completed')->whereNotNull('nfd')->when($request->month, function ($query) use ($request) {
					return $query->whereMonth('nfd', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('nfd', '=', $request->year);
				})->get();

				foreach ($sitecomp as $key => $value) {
					array_push($ar, Carbon::parse($value->nfd)->format('Y-m-d'));
				}
				$arr['site_visit_completed'] = array_count_values($ar);
				$type_array[] = 'site_visit_completed';
				// dd($arr['site_visit_completed'], "arr");
			}
			// discussion
			if ($request->dis) {
				$ar = [];
				$sitevisit = EnquiryProgress::whereHas('Enquiry')->where('status', 1)->where('progress', '=', 'Discussion')->whereNotNull('nfd')->when($request->month, function ($query) use ($request) {
					return $query->whereMonth('nfd', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('nfd', '=', $request->year);
				})->get();

				foreach ($sitevisit as $key => $value) {
					array_push($ar, Carbon::parse($value->nfd)->format('Y-m-d'));
				}
				$arr['discussion_schedule'] = array_count_values($ar);
				$type_array[] = 'discussion_schedule';
			}
			// Booked
			if ($request->done) {
				$ar = [];
				$sitevisit = EnquiryProgress::whereHas('Enquiry')->where('status', 1)->where('progress', '=', 'Booked')->when($request->month, function ($query) use ($request) {
					return $query->whereMonth('created_at', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('created_at', '=', $request->year);
				})->get();

				foreach ($sitevisit as $key => $value) {
					array_push($ar, Carbon::parse($value->nfd)->format('Y-m-d'));
				}
				$arr['booked'] = array_count_values($ar);
				$type_array[] = 'booked';
			}
			// Lost
			if ($request->lost) {
				$ar = [];
				$sitevisit = EnquiryProgress::whereHas('Enquiry')->where('status', 1)->where('progress', '=', 'Lost')->when($request->month, function ($query) use ($request) {
					return $query->whereMonth('created_at', '=', $request->month);
				})->when($request->year, function ($query) use ($request) {
					return $query->whereYear('created_at', '=', $request->year);
				})->get();

				foreach ($sitevisit as $key => $value) {
					array_push($ar, Carbon::parse($value->nfd)->format('Y-m-d'));
				}
				$arr['lost'] = array_count_values($ar);
				$type_array[] = 'lost';
			}
			$custom_calender_array = [];

			// Fetch the names associated with each type
			$type_names = [
				'new_enquiry' => ['name' => 'New Enquiry', 'class' => 'event-type-new-enquiry'],
				'leadConf' => ['name' => 'Lead Confirmed', 'class' => 'event-type-lead-confirmed'],
				'site_visit_scheduled' => ['name' => 'Site Visit Scheduled', 'class' => 'event-type-site-visit-scheduled'],
				'site_visit_completed' => ['name' => 'Site Visit Completed', 'class' => 'event-type-site-visit-completed'],
				'discussion_schedule' => ['name' => 'Discussion', 'class' => 'event-type-discussion'],
				'booked' => ['name' => 'Booked', 'class' => 'event-type-booked'],
				'lost' => ['name' => 'Lost', 'class' => 'event-type-lost'],
			];
			foreach ($arr as $key => $value) {
				foreach ($value as $key2 => $value2) {
					$date = Carbon::parse($key2)->format('Y-m-d 00:00:00');
					if (isset($custom_calender_array[$date])) {
						continue;
					}
					$custom_calender_array[$date] = $type_array;

					$event['start'] = $date;
					$types = implode(",", $type_array);
					$event['url'] = route('admin.enquiries.calendar.view') . '?date=' . $key2 . '&type=' . $types;

					$title = "";
					$classes = []; // Initialize the classes array for each event
					foreach ($type_array as $type) {
						if (isset($type_names[$type])) {
							$count = isset($arr[$type][$key2]) ? $arr[$type][$key2] : 0;
							if ($count > 0) {
								$title .= $type_names[$type]['name'] . ' (' . $count . ")\n";
								$classes[] = $type_names[$type]['class']; // Add the CSS class to the classes array
							}
						}
					}

					$event['title'] = $title;
					$event['id'] = 'event-' . $key . '-' . $key2;
					$event['classname'] = implode(' ', $classes); // Combine all CSS classes into a single string

					array_push($events, $event);
				}
			}
			// dd($events);
			return json_encode($events);
		}
		$employees = User::where('parent_id', Session::get('parent_id'))->orWhere('id', Session::get('parent_id'))->get();
		return view('admin.calendar.index', compact('employees'));
	}


	public function getProgress(Request $request)
	{
		$progress = EnquiryProgress::with('User', 'Dropdowns')->where('enquiry_id', $request->id)->orderBy('id', 'DESC')->get()->toArray();
		foreach ($progress as $key => $value) {
			$value['created_at'] = Carbon::parse($value['created_at'])->format('d-m-Y');
			$value['nfd'] = Carbon::parse($value['nfd'])->format('d-m-Y g:i A');
			$progress[$key] = $value;
		}
		return json_encode($progress);
	}

	public function getSchedule(Request $request)
	{
		$progress = QuickSiteVisit::with('AssignedTo', 'AssignedBy')->where('enquiry_id', $request->id)->orderBy('id', 'DESC')->get()->toArray();
		foreach ($progress as $key => $value) {
			$value['created_at'] = Carbon::parse($value['created_at'])->format('d-m-Y');
			$value['visit_date'] = Carbon::parse($value['visit_date'])->format('d-m-Y g:i A');
			$progress[$key] = $value;
		}
		return json_encode($progress);
	}

	public function saveEnquiry(Request $request)
	{
		// dd($request->all(),"res");
		if (!empty($request->id) && $request->id != '') {
			$data = Enquiries::find($request->id);
			if (empty($data)) {
				$data =  new Enquiries();
			}
		} else {
			$data =  new Enquiries();
			$data->transfer_date = date('Y-m-d');
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
		$data->village_id = json_encode($request->village_id);
		$data->zone_id    = isset($request->zone) ? $request->zone : NULL;
		$data->save();
		if (!empty($request->area_measurement)) {
			Helper::add_default_measuerement($request->area_measurement);
		}
	}

	public function importEnquiry(Request $request)
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

			$user_id = NULL;
			if (!empty($value['AssingedTo'])) {
				$user = User::where('parent_id', Session::get('parent_id'))->where('first_name', 'like', '%' . explode(' ', $value['AssingedTo'])[0])->where('last_name', 'like', '%' . explode(' ', $value['AssingedTo'])[1])->first();
			}


			if (!empty($user->id) && !empty($value['AssingedTo'])) {
				$user_id = $user->id;
			}

			$property_type_id = NULL;
			$property_type = DropdownSettings::where('name', 'like', '%' . $value['RequirementType'] . '%')->first();
			if (!empty($property_type->id) && !empty($value['RequirementType'])) {
				$property_type_id = $property_type->id;
			}

			$specific_property_id = NULL;
			$specific_property = DropdownSettings::where('name', 'like', '%' . $value['SpecificPropertyType'] . '%')->first();
			if (!empty($specific_property->id) && !empty($value['SpecificPropertyType'])) {
				$specific_property_id = $specific_property->id;
			}

			$Configuration_id = NULL;
			$Configuration = DropdownSettings::where('name', 'like', '%' . $value['Configuration1'] . '%')->first();
			if (!empty($Configuration->id) && !empty($value['Configuration1'])) {
				$Configuration_id = $Configuration->id;
			}

			$Configuration_id2 = NULL;
			$Configuration2 = DropdownSettings::where('name', 'like', '%' . $value['Configuration2'] . '%')->first();
			if (!empty($Configuration2->id) && !empty($value['Configuration2'])) {
				$Configuration_id2 = $Configuration2->id;
			}


			$enquiry_source_id = NULL;
			$enquiry_source = DropdownSettings::where('name', 'like', '%' . $value['Enquiry Source'] . '%')->first();
			if (!empty($enquiry_source->id) && !empty($value['Enquiry Source'])) {
				$enquiry_source_id = $enquiry_source->id;
			}

			$telephonic = NULL;
			if (empty($value['Enquiry Progress'])) {
				$telephonic = $value['Remarks'];
			}

			if (!empty($value['ClientName'])) {
				$data =  new Enquiries();
				$data->added_by = Auth::user()->id;
				$data->user_id = Session::get('parent_id');
				$data->client_name = $value['ClientName'];
				$data->client_mobile = $value['Mobile'];
				$data->client_email = $value['Email'];
				$data->enquiry_for = $value['EnquiryFor'];
				$data->requirement_type = json_encode([$property_type_id]);
				$data->property_type =  json_encode([$specific_property_id]);
				$data->configuration = json_encode([$Configuration_id, $Configuration_id2]);
				$data->enquiry_source = $enquiry_source_id;
				$data->budget_from = $value['BudgetFrom'];
				$data->budget_to = $value['BudgetTo'];
				$data->employee_id = $user_id;
				$data->enquiry_status = $value['Status'];
				$data->telephonic_discussion = $telephonic;
				$data->save();
			}

			if (!empty($value['Enquiry Progress'])) {
				EnquiryProgress::create(['user_id' => ((!empty($user_id)) ? $user_id : Session::get('parent_id')), 'progress' => $value['Enquiry Progress'], 'remarks' => $value['Remarks'], 'enquiry_id' => $data->id]);
			}
		}
	}

	public function transferNow(Request $request)
	{
		if (!empty($request->employee) && !empty($request->enquiry_id)) {
			Enquiries::where('id', $request->enquiry_id)->update(['employee_id' => $request->employee], ['transfer_date' => Carbon::now()->format('Y-m-d H:i:s')]);
			/* Stored Assign Enquiry History */
			AssignHistory::create(['enquiry_id' => $request->enquiry_id, 'user_id' => Auth::user()->id, 'assign_id' => $request->employee]);
		}
	}

	public function getContacts(Request $request)
	{
		if (!empty($request->enquiry_id)) {
			return Enquiries::find($request->enquiry_id)->other_contacts;
		}
	}

	public function saveContacts(Request $request)
	{
		if (!empty($request->contacts) && !empty($request->enquiry_id)) {
			Enquiries::where('id', $request->enquiry_id)->update(['other_contacts' => $request->contacts]);
		}
	}


	public function getSpecificEnquiry(Request $request)
	{

		if (!empty($request->id)) {
			$data = Enquiries::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Enquiries::where('id', $request->id)->delete();
			return json_encode($data);
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0])) {
			$data = Enquiries::whereIn('id', json_decode($request->allids))->delete();
			return json_encode($data);
		}
	}

	public function enqueryAssignHistory(Request $request)
	{
		return view('admin.enquiries.assign_history');
	}

	public function getEnquiryHistory(Request $request)
	{
		$data['assign_history'] = AssignHistory::where('enquiry_id', $request->id)->orderBy('id', 'desc')->get();
		$view = view('admin.enquiries.assign_history_table', $data)->render();
		return response()->json(['status' => 200, 'html' => $view]);
	}

	public function viewEnquiry(Request $request, $id)
	{
		$dropdowns = DropdownSettings::get()->toArray();
		$data = Enquiries::with('Employee', 'Progress.Dropdowns', 'Visits', 'Comments', 'Progress.User', 'Progress.Dropdowns', 'activeProgress', 'AssignHistory')->find(decrypt($id));

		$city = '';
		$employee = '';
		if (!empty($data->enquiry_city_id)) {
			$city = City::find($data->enquiry_city_id);
		}


		if (!empty($data->employee_id)) {
			$employee = User::find($data->employee_id);
		}

		$dropdownsarr = [];
		foreach ($dropdowns as $key => $value) {
			$dropdownsarr[$value['id']] = $value;
		}
		$dropdowns = $dropdownsarr;

		$areas = Areas::where('user_id',Auth::user()->id)->get()->toArray();
		$areaarr = [];
		foreach ($areas as $key => $value) {
			$areaarr[$value['id']] = $value;
		}
		$areas = $areaarr;
		$area_name = '';
		if (!empty($data->area_ids)) {
			foreach (json_decode($data->area_ids) as $key => $value) {
				if (isset($areas[$value]['name'])) {
					if ($key > 0) {
						$area_name .= ', ' . $areas[$value]['name'];
					} else {
						$area_name .= $areas[$value]['name'];
					}
				}
			}
		}

		$builds = Projects::get()->toArray();
		$buildarr = [];
		foreach ($builds as $key => $value) {
			$buildarr[$value['id']] = $value;
		}
		$builds = $buildarr;
		$project_name = '';
		if (!empty($data->building_id) && isset(json_decode($data->building_id)[0])) {
			foreach (json_decode($data->building_id) as $key => $value) {
				if (isset($builds[$value]['project_name'])) {
					if ($key > 0) {
						$project_name .= ', ' . $builds[$value]['project_name'];
					} else {
						$project_name .= $builds[$value]['project_name'];
					}
				}
			}
		}

		$prop_type = '';
		$configuration_name = '';
		$requiretype_name = '';
		$furnished = '';
		if (!empty($data->property_type) && !empty($dropdowns[$data->property_type]['name'])) {
			$prop_type = $dropdowns[$data->property_type]['name'];
		}

		$dataConfiguration = json_decode($data->configuration);

		if (!empty($dataConfiguration) && is_array($dataConfiguration)) {
			$configuration = config('constant.property_configuration');
			$configuration_name = [];

			foreach ($dataConfiguration as $id) {
				if (isset($configuration[$id])) {
					$configuration_name[] = $configuration[$id];
				}
			}
		}


		if (!empty($data->requirement_type) && !empty($dropdowns[$data->requirement_type]['name'])) {
			$requiretype_name = $dropdowns[$data->requirement_type]['name'];
		}

		if (!empty($data->furnished_status) && isset(json_decode($data->furnished_status)[0])) {
			foreach (json_decode($data->furnished_status) as $key => $value) {
				if (isset($dropdowns[$value]['name'])) {
					if ($key > 0) {
						$furnished .= ', ' . $dropdowns[$value]['name'];
					} else {
						$furnished .= $dropdowns[$value]['name'];
					}
				}
			}
		}

		// match query
		$property_for = ($data->enquiry_for == 'Buy') ? 'Sell' : $data->enquiry_for;
		$budgetFrom = str_replace(',', '', $data->budget_from);
		$budgetTo = str_replace(',', '', $data->budget_to);
		$areaFrom = $data->area_from;
		$areaTo = $data->area_to;
		$properties = Properties::where('properties.property_type', $data->requirement_type)
			->where('properties.property_for', $property_for)
			->where('properties.property_category', $data->property_type)
			->where(function ($query) use ($budgetFrom, $budgetTo, $areaFrom, $areaTo) {
				$query->where(function ($query) use ($budgetFrom, $budgetTo) {
					$query->where('properties.survey_price', '>=', $budgetFrom)
						->where('properties.survey_price', '<=', $budgetTo);
				})
					->orWhere(function ($query) use ($budgetFrom, $budgetTo) {
						$query->whereRaw('CAST(REPLACE(REPLACE(JSON_EXTRACT(properties.unit_details, "$[0][4]"), ",", ""), "\"", "") AS UNSIGNED) >= ?', $budgetFrom)
							->whereRaw('CAST(REPLACE(REPLACE(JSON_EXTRACT(properties.unit_details, "$[0][4]"), ",", ""), "\"", "") AS UNSIGNED) <= ?', $budgetTo);
					})
					->Where(function ($query) use ($areaFrom, $areaTo) {
						$query->whereRaw("SUBSTRING_INDEX(properties.salable_area, '_-||-_', 1) BETWEEN ? AND ?", [$areaFrom, $areaTo])
							->orWhereRaw("SUBSTRING_INDEX(properties.constructed_salable_area, '_-||-_', 1) BETWEEN ? AND ?", [$areaFrom, $areaTo]);
					});
			})
			->get();
		$employees = User::where('parent_id', Session::get('parent_id'))->get();
		$configuration_settings = DropdownSettings::get()->toArray();
		$projects = Projects::orderBy('project_name')->get();
		$cities = City::orderBy('name')->get();
		$branches = Branches::orderBy('name')->get();
		$areas = Areas::where('user_id',Auth::user()->id)->orderBy('name')->get();
		$prop_list = Helper::get_property_units_helper();
		return view('admin.enquiries.view', compact('areas', 'employees', 'data', 'prop_type', 'configuration_name', 'requiretype_name', 'area_name', 'city', 'branches', 'cities', 'project_name', 'employee', 'dropdowns', 'furnished', 'configuration_settings', 'projects', 'properties', 'prop_list'));
	}


	public function calenderDetail(Request $request)
	{
		// dd($request->all());
		// click to edit cal
		$type = explode(',', $request->type);
		// dd("type bhrt", $type);
		if (in_array('new_enquiry', $type)) {
			$data['new_enquiry'] = Enquiries::whereDate('created_at', $request->date)->get();
		}
		if (in_array('leadConf', $type)) {
			$data['leadConf'] = EnquiryProgress::whereHas('Enquiry')
				->where('status', 1)
				->where('progress', '=', 'Lead Confirmed')
				->whereNotNull('nfd')
				->whereDate('nfd', '=', $request->date)
				->get();
		}
		if (in_array('site_visit_scheduled', $type)) {
			$data['site_visit_scheduled'] = EnquiryProgress::whereHas('Enquiry')
				->where('status', 1)
				->where('progress', '=', 'Site Visit Scheduled')
				->whereNotNull('nfd')
				->whereDate('nfd', '=', $request->date)
				->get();
		}
		// site_visit_completed
		if (in_array('site_visit_completed', $type)) {
			$data['site_visit_completed'] = EnquiryProgress::whereHas('Enquiry')
				->where('status', 1)
				->where(
					'progress',
					'=',
					'Site Visit Completed'
				)
				->whereNotNull('nfd')
				->whereDate('nfd', '=', $request->date)
				->get();
			// dd($data['site_visit_completed'], "site_visit_completedsite_visit_completed");
		}
		if (in_array('discussion_schedule', $type)) {
			$data['discussion_schedule'] = EnquiryProgress::whereHas('Enquiry')
				->where('status', 1)
				->where('progress', '=', 'Discussion')
				->whereNotNull('nfd')
				->whereDate('nfd', '=', $request->date)
				->get();
		}
		if (in_array('booked', $type)) {
			$data['booked'] = EnquiryProgress::whereHas('Enquiry')
				->where('status', 1)
				->where('progress', '=', 'Booked')
				->whereDate('nfd', '=', $request->date)
				->get();
		}
		if (in_array('lost', $type)) {
			$data['lost'] = EnquiryProgress::whereHas('Enquiry')
				->where('status', 1)
				->where('progress', '=', 'Lost')
				->whereDate('nfd', '=', $request->date)
				->get();
		}

		$areas = Areas::where('user_id',Auth::user()->id)->get();
		$areaarr = [];
		foreach ($areas as $key => $value) {
			$areaarr[$value['id']] = $value;
		}
		$data['areas'] = $areaarr;

		$builds = Projects::orderBy('project_name')->get();
		$buildarr = [];
		foreach ($builds as $key => $value) {
			$buildarr[$value['id']] = $value;
		}
		$data['builds'] = $buildarr;
		$data['projects'] = $buildarr;

		$dropdowns = DropdownSettings::get()->toArray();
		$dropdownsarr = [];
		foreach ($dropdowns as $key => $value) {
			$dropdownsarr[$value['id']] = $value;
		}
		$data['dropdowns'] = $dropdownsarr;

		$configuration_settings = DropdownSettings::get()->toArray();
		$data['configuration_settings'] = $configuration_settings;
		$cities = City::orderBy('name')->get();
		$data['cities'] = $cities;
		$branches = Branches::orderBy('name')->get();
		$data['branches'] = $branches;
		$employees = User::where('parent_id', Session::get('parent_id'))->orWhere('id', Session::get('parent_id'))->get();
		$data['employees'] = $employees;
		// dd($data, "Data");

		return view('admin.calendar.view', $data);
	}
	public function addEnquiry(Request $request)
	{
		$prop_list = Helper::get_property_units_helper();
		$projects = Projects::orderBy('project_name')->get();
		$configuration_settings = DropdownSettings::get()->toArray();
		$enquiry_list = ['Commercial', 'Office'];
		$prop_type = [];
		foreach ($configuration_settings as $key => $value) {
			if (($value['name'] == 'Commercial' || $value['name'] == 'Residential') && str_contains($value['dropdown_for'], 'property_')) {
				array_push($prop_type, $value['id']);
			}
		}
		$cities = City::orderBy('name')->get();
		$branches = Branches::orderBy('name')->get();
		$areas = Areas::where('user_id',Auth::user()->id)->orderBy('name')->get();
		$employees = User::where('parent_id', Session::get('parent_id'))->orWhere('id', Session::get('parent_id'))->get();
		$districts = District::orderBy('name')->get();
		$talukas   = Taluka::orderBy('name')->get();
		$villages  = Village::orderBy('name')->get();
		return view('admin.properties.add_enquiry', compact('enquiry_list', 'prop_type', 'projects', 'branches', 'cities', 'areas', 'configuration_settings', 'employees', 'prop_list', 'districts', 'talukas', 'villages'));
	}

	public function editEnquiry(Request $request)
	{

		$prop_list = Helper::get_property_units_helper();
		$projects = Projects::orderBy('project_name')->get();
		$enquiry_list = Enquiries::where('id', $request->id)->get();
		$configuration_settings = DropdownSettings::get()->toArray();
		$prop_type = [];
		foreach ($configuration_settings as $key => $value) {
			if (($value['name'] == 'Commercial' || $value['name'] == 'Residential') && str_contains($value['dropdown_for'], 'property_')) {
				array_push($prop_type, $value['id']);
			}
		}

		$cities = City::orderBy('name')->get();
		$branches = Branches::orderBy('name')->get();
		$areas = Areas::where('user_id',Auth::user()->id)->orderBy('name')->get();
		$employees = User::where('parent_id', Session::get('parent_id'))->orWhere('id', Session::get('parent_id'))->get();
		$current_id = $request->id;

		$districts = District::orderBy('name')->get();
		$talukas   = Taluka::orderBy('name')->get();
		$villages  = Village::orderBy('name')->get();

		$edit_configuration = Enquiries::where('id', $request->id)->pluck('configuration');
		$edit_category = Enquiries::where('id', $request->id)->pluck('property_type');
		// 		dd($edit_configuration,$edit_category,$enquiry_list,$prop_type,$projects);
		return view('admin.properties.add_enquiry', compact('edit_configuration', 'edit_category', 'enquiry_list', 'prop_type', 'projects', 'branches', 'cities', 'areas', 'configuration_settings', 'employees', 'prop_list', 'current_id', 'districts', 'talukas', 'villages'));
	}
	public function getEnquiryConfiguration(Request $request)
	{
		$selectedCategory = $request->query('selectedCategory');
		$filteredConfig = [];
		if ($selectedCategory === 'Flat' || $selectedCategory === 'Penthouse') {
			$filteredKeys = ['13', '14', '15', '16', '17', '18'];
		}
		if ($selectedCategory === 'Vila/Bunglow') {
			// $filteredKeys = ['21', '22', '23', '24', '25'];
			$filteredKeys = ['14', '15', '16', '17', '18'];
		}
		if ($selectedCategory === 'Land/Plot' || $selectedCategory === 'Plot/Land') {
			$filteredKeys = ['10', '11', '12'];
		}
		if ($selectedCategory === 'Farmhouse') {
			$filteredKeys = [];
		}
		if ($selectedCategory === 'Office') {
			$filteredKeys = ['1', '2'];
		}
		if ($selectedCategory === 'Retail') {
			$filteredKeys = ['3', '4', '5', '6'];
		}
		if ($selectedCategory === 'Storage/industrial') {
			$filteredKeys = ['7', '8', '9', '20'];
		}
		$propertyConfiguration = config('constant.property_configuration');
		foreach ($filteredKeys as $key) {
			if (isset($propertyConfiguration[$key])) {
				$filteredConfig[$key] = $propertyConfiguration[$key];
			}
		}
		return response()->json($filteredConfig);
	}
	public function deleteRecord($id)
	{
		$record = EnquiryProgress::find($id);
		// dd("recprd ==", $record->id);
		if ($record) {
			$record->delete();
			return response()->json(['message' => 'Record deleted successfully']);
		} else {
			return response()->json(['message' => 'Record not found'], 404);
		}
	}
}
