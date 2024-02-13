<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DropdownSettings;
use App\Models\ShareProperty;
use App\Models\SharedProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ShareController extends Controller
{
    //
    // shared 4
    public function acceptRequest(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->id)) {
                // $dataa = SharedProperty::find($request->id)->update(['accepted' => 1]);
                $dataa = DB::table('share_property')
                    ->where('id', $request->id)
                    ->update(['accepted' => 1]);
                return redirect()->route('admin.shared.properties');
            }
        }
    }

    // shared 3
    public function cancelRequest(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->id)) {
                // SharedProperty::find($request->id)->update(['accepted' => 2]);
                // $dlt_share_prop = SharedProperty::where('id', $request->id)->delete();
                // return json_encode($dlt_share_prop);
                $affectedRows = DB::table('share_property')
                    ->where('id', $request->id)
                    ->update(['accepted' => 2]);

                // $deletedRows = DB::table('share_property')
                //     ->where('id', $request->id)
                //     ->delete();

                return json_encode([
                    'updated_rows' => $affectedRows,
                ]);
            }
        }
    }


    // shared 1
    public function sharedPropertyRequests(Request $request)
    {
        // dd("shared-requests third party pending");
        if ($request->ajax()) {
            $data = DB::table('share_property')
                ->select([
                    'share_property.id',
                    'share_property.accepted',
                    'projects.project_name',
                    DB::raw("CONCAT(users.first_name ,'',users.last_name) AS user_name")
                ])
                ->join('properties', 'properties.id', 'share_property.property_id')
                ->join('projects', 'projects.id', 'properties.project_id')
                ->join('users', 'users.id', 'share_property.user_id')
                ->where('share_property.partner_id', Auth::user()->id)
                ->get();

            return DataTables::of($data)
                ->addColumn('project_name', function ($shared) {
                    //  dd($shared->Property_details);
                    if (!empty($shared->project_name)) {
                        return ($shared->project_name);
                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn('user_name', function ($shared) {
                    if (!empty($shared->user_name)) {
                        return $shared->user_name;
                        // return $shared->User->first_name . ' ' . $shared->User->last_name . ' | ' . $shared->User->company_name;
                    } else {
                        return 'N/A';
                    }
                })

                ->editColumn('Action', function ($row) {
                    $buttons = '';
                    //  dd($row->id);
                    if (!$row->accepted) {
                        $buttons .=   ' <button data-id="' . $row->id . '" onclick=acceptRequest(this) class="btn btn-pill btn-danger" type="button">Accept</button>';
                    }
                    $buttons .=   ' <button data-id="' . $row->id . '" onclick=cancelRequest(this) class="btn btn-pill btn-primary" type="button">Cancel</button>';
                    return $buttons;
                })
                ->rawColumns(['project_name', 'user_name', 'Action'])
                ->make(true);
        }
        return view('admin.properties.shared_requets');
    }

    // shared 2
    public function sharedPropertyIndex(Request $request)
    {
        //   dd("shared-properties Me working done  ===>");
        if ($request->ajax()) {
            $dropdowns = DropdownSettings::get()->toArray();
            $dropdownsarr = [];
            foreach ($dropdowns as $key => $value) {
                $dropdownsarr[$value['id']] = $value;
            }
            $dropdowns = $dropdownsarr;
            // $data = SharedProperty::with('Property_details', 'User')
            //     ->where('partner_id', Auth::user()->id)
            //     ->Where('accepted', '1')
            //     ->get();

            // $data2 = SharedProperty::with('Property_details', 'User')->where('user_id', Auth::user()->id)->get();

            $data = DB::table('share_property')
                ->select('share_property.*', 'properties.constructed_salable_area as constructed_salable_area', 'users.first_name as first_name', 'properties.salable_plot_area as salable_plot_area', 'properties.salable_area as salable_area', 'properties.configuration as property_configuration', 'properties.unit_details as unit_details', 'users.office_number as office_number', 'users.mobile_number as mobile_number', 'users.last_name as last_name', 'projects.project_name', 'properties.remarks as remarks', 'properties.property_category as property_category', 'properties.property_for as property_for', 'properties.location_link as property_link', 'areas.name as area_name')
                ->leftJoin('properties', 'share_property.property_id', '=', 'properties.id')
                ->leftJoin('projects', 'properties.project_id', '=', 'projects.id')
                ->leftJoin('areas', 'projects.area_id', '=', 'areas.id')
                ->leftJoin('users', 'share_property.user_id', '=', 'users.id')
                ->where('share_property.partner_id', Auth::user()->id)
                ->where('share_property.accepted', 1)
                ->get();

            $data2 = DB::table('share_property')
                ->select('share_property.*', 'properties.constructed_salable_area as constructed_salable_area', 'users.first_name as first_name', 'properties.salable_plot_area as salable_plot_area', 'properties.salable_area as salable_area', 'properties.unit_details as unit_details', 'properties.configuration as property_configuration', 'users.office_number as office_number', 'users.mobile_number as mobile_number', 'users.last_name as last_name', 'projects.project_name', 'properties.remarks as remarks', 'properties.property_category as property_category', 'properties.property_for as property_for', 'properties.location_link as property_link', 'areas.name as area_name')
                ->leftJoin('properties', 'share_property.property_id', '=', 'properties.id')
                ->leftJoin('projects', 'properties.project_id', '=', 'projects.id')
                ->leftJoin('areas', 'projects.area_id', '=', 'areas.id')
                ->leftJoin('users', 'share_property.user_id', '=', 'users.id')
                ->where('share_property.user_id', Auth::user()->id)
                ->get();
            $mergedData = $data->concat($data2);
            // dd($mergedData);
            return DataTables::of($mergedData)
                ->editColumn('project_name', function ($row) use ($request) {
                    $first =  '<td style="vertical-align:top">
                         <font size="3"><a href="#" style="font-weight: bold;">' . ((isset($row->project_name)) ? $row->project_name : '') . '</a>';
                    $first_end = '</font>';
                    $second = '<br> <a href="' . $row->property_link . '" target="_blank"> <font size="2" style="font-style:italic">Locality: ' . ((!empty($row->area_name)) ? $row->area_name : '') . '	</font> </a>';
                    // $third = '<br> <font size="2" style="font-style:italic">Added On: ' . Carbon::parse($row->Property_details->created_at)->format('d-m-Y') . '</font>';
                    $last =     '</td>';

                    '</td>';
                    return $first . $first_end . $second  .  $last;

                    return '';
                })
                ->editColumn('super_builtup_area', function ($row) use ($dropdowns) {
                    $new_array = array('', 'office space', 'Co-working', 'Ground floor', '1st floor', '2nd floor', '3rd floor', 'Warehouse', 'Cold Storage', 'ind. shed', 'Commercial Land', 'Agricultural/Farm Land', 'Industrial Land', '1 rk', '1bhk', '2bhk', '3bhk', '4bhk', '5bhk', '5+bhk', 'Test', 'testw', 'fgfgmf', 'sfbsbsfn', '252626', 'sh');
                    if ($row->property_for == 'Both') {
                        $forr = 'Rent & Sell';
                    } else {
                        $forr = $row->property_for;
                    }
                    $fstatus  = '';
                    $sub_cat = ((!empty($dropdowns[$row->property_category]['name'])) ? ' | ' . $dropdowns[$row->property_category]['name'] : '');
                    // dd("cc",$row->property_configuration);
                    if (!is_null($row->property_configuration)) {
                        $catId = (int)$row->property_configuration;
                        //$getsub_category = Helper::getsubcategory($catId);
                        $getsub_category = $new_array[$catId];

                        if (!is_null($getsub_category)) {
                            $sub_cat = ' | ' . $getsub_category;
                            if ($sub_cat == " | Agricultural/Farm Land") {
                                $sub_cat = " | Agricultural";
                            }
                        }
                    }
                    $category = $sub_cat;
                    if ($row->property_category == '256') {
                        $fstatus  = '';
                    } else {
                        $fstatus  = 'Unfurnished';
                        if (!empty($row->unit_details) && !empty(json_decode($row->unit_details)[0])) {
                            $vv = json_decode($row->unit_details);
                            if (isset($vv[0][8])) {
                                if (!empty($vv[0][8])) {
                                    if ($vv[0][8] == "106") {
                                        $fstatus = 'Furnished';
                                    } elseif ($vv[0][8] == "107") {
                                        $fstatus = 'Semi Furnished';
                                    } elseif ($vv[0][8] == "108") {
                                        $fstatus = 'Unfurnished';
                                    } else {
                                        $fstatus = 'Can Furnished';
                                    }
                                }
                            }
                        }
                    }

                    $salable_area_print = $this->generateAreaDetails($row, $dropdowns[$row->property_category]['name'], $dropdowns);
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
                        <br>' . $fstatus . '
                     </td>';
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                })
                // ->editColumn('owner_details', function ($row) {
                // 	$detail = '';
                // 	if (!empty($row->User)) {
                // 		$detail =  '<td align="center" style="vertical-align:top">
                // 			' . $row->User->first_name . ' ' . $row->User->last_name . ' <br>
                // 			<a href="tel:' .  $row->User->office_number . '">' . $row->User->mobile_number . '</a>
                // 			 </td>';
                // 	};
                // 	return $detail;
                // })
                ->editColumn('units', function ($row) {
                    $all_units = [];
                    if (!empty($row->unit_details) && !empty(json_decode($row->unit_details)[0])) {
                        $vv = json_decode($row->unit_details);
                        foreach ($vv as $key => $value) {
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
                    if (!empty($all_units)) {
                        $vvv = '';
                        foreach ($all_units as $key => $value) {
                            $vvv = $vvv .  ((!empty($value[0])) ? $value[0] . '<br>' : '') . ((!empty($value[1])) ? $value[1] : '');
                        }
                        return $vvv;
                    }

                    return "N/A";
                })
                ->editColumn('price', function ($row) {
                    //$all_units = [];
                    $all_units = [];
                    // dd(($row->Property_details->unit_details));
                    if (!empty($row->unit_details) && !empty(json_decode($row->unit_details)[0])) {
                        $vv = json_decode($row->unit_details);
                        foreach ($vv as $key => $value) {
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
                    if (!empty($all_units)) {
                        $vvv = "";
                        foreach ($all_units as $key => $value) {
                            if (count($all_units) > 1 && $key > 0) {
                                $vvv .= ' <br> ';
                            }
                            $vvv .= $value[2];
                        }
                        return nl2br($vvv);
                    }
                    return;
                })
                ->editColumn('contact_name', function ($row) {
                    $partner_id = $row->partner_id;
                    $auth_id = Auth::user()->id;
                    $detail = '';
                    if ($partner_id != $auth_id) {
                        // $partner_details = User::where('id', $partner_id)->first();
                        $partner_details = DB::table('users')
                            ->select('*')
                            ->where('id', $partner_id)
                            ->first();

                        if (!empty($partner_details)) {
                            $detail =  'Sended By <td align="center" style="vertical-align:top">
                             ' . $partner_details->first_name . ' ' . $partner_details->last_name . '<br>
                             <a href="tel:' .  $partner_details->office_number . '">' . $partner_details->mobile_number . '</a>
                              </td>';
                        }
                    } elseif ($partner_id == $auth_id) {
                        if (!empty($row->first_name)) {
                            $detail =  'Received By <td align="center" style="vertical-align:top">
                             ' . $row->first_name . ' ' . $row->last_name . '<br>
                             <a href="tel:' .  $row->office_number . '">' . $row->mobile_number . '</a>
                              </td>';
                        }
                    }
                    return $detail;
                })
                ->editColumn('remarks', function ($row) {
                    return $row->remarks;
                })
                ->rawColumns(['project_name',  'super_builtup_area', 'contact_name', 'remarks', 'property_unit_no', 'units', 'price', 'owner_details'])
                ->make(true);
        }


        return view('admin.properties.shared_index');
    }

    public function generateAreaDetails($row, $type, $dropdowns)
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
}
