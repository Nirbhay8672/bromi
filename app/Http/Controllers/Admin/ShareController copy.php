<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DropdownSettings;
use App\Models\ShareProperty;
use App\Models\SharedProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ShareController extends Controller
{
    //
     // shared 4
     public function acceptRequest(Request $request)
     {
         // dd("shared req 4");
         if ($request->ajax()) {
             if (!empty($request->id)) {
                 SharedProperty::find($request->id)->update(['accepted' => 1]);
             }
         }
     }
 
     // shared 3
     public function cancelRequest(Request $request)
     {
         // dd("shared req 3");
         if ($request->ajax()) {
             if (!empty($request->id)) {
                 SharedProperty::find($request->id)->update(['accepted' => 2]);
                 $dlt_share_prop = SharedProperty::where('id', $request->id)->delete();
                 return json_encode($dlt_share_prop);
             }
         }
     }
 
 
     // shared 1
     public function sharedPropertyRequests(Request $request)
     {
         // dd("shared-requests third party pending");
         if ($request->ajax()) {
             $data = SharedProperty::where('partner_id', Auth::user()->id)->with(['Property_details', 'User'])->get();
 
             // dd("data",$data,"user",Auth::user()->id);
             return DataTables::of($data)
                 ->addColumn('project_name', function (SharedProperty $shared) {
                     if (!empty($shared->Property_details->Projects->project_name)) {
                         return ($shared->Property_details->Projects->project_name);
                     } else {
                         return 'N/A';
                     }
                 })
                 ->addColumn('user_name', function (SharedProperty $shared) {
                     if (!empty($shared->User->first_name || $shared->User->last_name)) {
                         return $shared->User->first_name . ' ' . $shared->User->last_name;
                         // return $shared->User->first_name . ' ' . $shared->User->last_name . ' | ' . $shared->User->company_name;
                     } else {
                         return 'N/A';
                     }
                 })
 
                 ->editColumn('Action', function ($row) {
                     $buttons = '';
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
             // $data = SharedProperty::where('user_id', Auth::user()->id)
             // 	->Where('accepted', '1')
             // 	->with(['Property', 'User'])->get();
             $data = SharedProperty::with('Property_details', 'User')
                 ->where('partner_id', Auth::user()->id)
                 ->Where('accepted', '1')
                 ->get();
             $data2 = SharedProperty::
                 with('Property_details', 'User')->where('user_id', Auth::user()->id)->
                 get();
            //  dd(Auth::user()->id, "SharedProperty third part req bharat", $data);
 
             $mergedData = $data->concat($data2);
             return DataTables::of($mergedData)
                 ->editColumn('project_name', function ($row) use ($request) {
                     // dd($row->Property_details,"prj");
                     $first =  '<td style="vertical-align:top">
                         <font size="3"><a href="#" style="font-weight: bold;">' . ((isset($row->Property_details->Projects->project_name)) ? $row->Property_details->Projects->project_name : '') . '</a>';
                     $first_middle = '';
                     if (isset($row->Property_details->Projects->is_prime) && $row->Property_details->Projects->is_prime) {
                         $first_middle = '<img style="height:24px" src="' . asset('assets/images/primeProperty.png') . '" alt="">';
                     }
                     if ($row->Property_details->hot_property) {
                         $first_middle = $first_middle . '<img style="height:24px" src="' . asset('assets/images/hotProperty.png') . '" alt="">';
                     }
 
                     if ($row->Property_details->property_for == 'Both') {
                         $first_middle = $first_middle . '<img style="height:24px" src="' . asset('assets/images/rentAndsell.jpg') . '" alt="">';
                     }
                     $first_end = '</font>';
                     $second = '<br> <a href="' . $row->Property_details->location_link . '" target="_blank"> <font size="2" style="font-style:italic">Locality: ' . ((!empty($row->Property_details->Projects->Area->name)) ? $row->Property_details->Projects->Area->name : '') . '	</font> </a>';
                     // $third = '<br> <font size="2" style="font-style:italic">Added On: ' . Carbon::parse($row->Property_details->created_at)->format('d-m-Y') . '</font>';
                     $last =     '</td>';
 
                     '</td>';
                     return $first . $first_middle . $first_end . $second  .  $last;
 
                     return '';
                 })
                 ->editColumn('super_builtup_area', function ($row) use ($dropdowns) {
                     $new_array = array('', 'office space', 'Co-working', 'Ground floor', '1st floor', '2nd floor', '3rd floor', 'Warehouse', 'Cold Storage', 'ind. shed', 'Commercial Land', 'Agricultural/Farm Land', 'Industrial Land', '1 rk', '1bhk', '2bhk', '3bhk', '4bhk', '4+bhk', 'Test', 'testw', 'fgfgmf', 'sfbsbsfn', '252626', 'sh');
                     if ($row->Property_details->property_for == 'Both') {
                         $forr = 'Rent & Sell';
                     } else {
                         $forr = $row->Property_details->property_for;
                     }
 
                     $sub_cat = ((!empty($dropdowns[$row->Property_details->property_category]['name'])) ? ' | ' . $dropdowns[$row->Property_details->property_category]['name'] : '');
                     if (!is_null($row->Property_details->configuration)) {
                         $catId = (int)$row->Property_details->configuration;
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
                     if ($row->Property_details->property_category == '256') {
                         $fstatus  = '';
                     } else {
                         $fstatus  = 'Unfurnished';
                         if (!empty($row->Property_details->unit_details) && !empty(json_decode($row->Property_details->unit_details)[0])) {
                             $vv = json_decode($row->Property_details->unit_details);
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
 
                     $salable_area_print = $this->generateAreaDetails($row->Property_details, $dropdowns[$row->Property_details->property_category]['name'], $dropdowns);
 
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
                     if (!empty($row->Property_details->unit_details) && !empty(json_decode($row->Property_details->unit_details)[0])) {
                         $vv = json_decode($row->Property_details->unit_details);
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
                     if (!empty($row->Property_details->unit_details) && !empty(json_decode($row->Property_details->unit_details)[0])) {
                         $vv = json_decode($row->Property_details->unit_details);
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
                         $partner_details = User::where('id', $partner_id)->first();
                         if (!empty($partner_details)) {
                             $detail =  'Sended By <td align="center" style="vertical-align:top">
                             ' . $partner_details->first_name . ' ' . $partner_details->last_name . '<br>
                             <a href="tel:' .  $partner_details->office_number . '">' . $partner_details->mobile_number . '</a>
                              </td>';
                         }
                     } elseif ($partner_id == $auth_id) {
                         if (!empty($row->User)) {
                             $detail =  'Received By <td align="center" style="vertical-align:top">
                             ' . $row->User->first_name . ' ' . $row->User->last_name . '<br>
                             <a href="tel:' .  $row->User->office_number . '">' . $row->User->mobile_number . '</a>
                              </td>';
                         }
                     }
                     return $detail;
                 })
                 ->editColumn('remarks', function ($row) {
                     return $row->Property_details->remarks;
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
 
         if ($type == 'Office' || $type == 'Retail' || $type == 'Flat' || $type == 'Penthouse' || $type == 'Land/Plot') {
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
