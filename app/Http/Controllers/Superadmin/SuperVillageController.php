<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\SuperTaluka;
use App\Models\SuperVillages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuperVillageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function village_index(Request $request)
	{
		if ($request->ajax()) {

			$data = SuperVillages::join('super_talukas','super_talukas.id','super_villages.super_taluka_id')
				->select([
					'super_villages.id',
					'super_villages.name',
					'super_talukas.name AS taluka_name',
					'district.name AS district_name',
				])
				->join('district','district.id', 'super_talukas.district_id')
				->orderBy('super_villages.id','desc');

			return DataTables::of($data)
				->editColumn('select_checkbox', function ($row) {
					$abc = '<div class="form-check checkbox checkbox-primary mb-0">
				<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
				<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  </div>';
					return $abc;
				})
				->editColumn('taluka', function ($row) {
					if (isset($row->taluka_name)) {
						return $row->taluka_name;
					}
					return '';
				})
				->editColumn('district', function ($row) {
					if (isset($row->district_name)) {
						return $row->district_name;
					}
					return '';
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<i role="button" title="Edit" data-id="' . $row->id . '" onclick=getVillage(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';

					$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteVillage(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					return $buttons;
				})
				->rawColumns(['Actions', 'select_checkbox'])
				->make(true);
		}
		$talukas = SuperTaluka::orderBy('name')->get()->toArray();
		$districts = District::orderBy('name')->get()->toArray();
		return view('superadmin.supersettings.super_village_index', compact('talukas', 'districts'));
	}

	public function village_store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = SuperVillages::find($request->id);
			if (empty($data)) {
				$exist = SuperVillages::where('name', $request->name)->where('super_taluka_id', $request->super_taluka_id)->first();
				if (!empty($exist)) {
					return;
				}
				$data =  new SuperVillages();
			}
		} else {
			$exist = SuperVillages::where('name', $request->name)->where('super_taluka_id', $request->super_taluka_id)->first();
			if (!empty($exist)) {
				return;
			}
			$data =  new SuperVillages();
		}
		$data->name = $request->name;
		$data->super_taluka_id = $request->super_taluka_id;
		$data->district_id = $request->district_id;
		$data->save();
	}

	public function get_village(Request $request)
	{
		if (!empty($request->id)) {
			$data = SuperVillages::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function village_delete(Request $request)
	{
		if (!empty($request->id)) {
			SuperVillages::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0])) {
			SuperVillages::whereIn('id', json_decode($request->allids))->delete();
		}
	}
}
