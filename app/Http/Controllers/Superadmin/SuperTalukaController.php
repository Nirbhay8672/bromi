<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\SuperTaluka;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuperTalukaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = SuperTaluka::with('district')->orderBy('id', 'desc')->get();
			return DataTables::of($data)
				->editColumn('select_checkbox', function ($row) {
					$abc = '<div class="form-check checkbox checkbox-primary mb-0">
				<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
				<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  </div>';
					return $abc;
				})
				->editColumn('district_id', function ($row) {
					if (!empty($row->district->name)) {
						return $row->district->name;
					}
					return '';
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Edit" onclick=getCity(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Delete" onclick=deleteTaluka(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					return $buttons;
				})
				->rawColumns(['Actions', 'select_checkbox'])
				->make(true);
		}
		$districts = District::orderBy('name')->get();
		return view('superadmin.supersettings.super_taluka_index', compact('districts'));
	}

	public function details(Request $request)
	{
		if (!empty($request->id)) {
			$data = SuperTaluka::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function talukas_destroy(Request $request)
	{
		if (!empty($request->id)) {
			SuperTaluka::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0])) {
			SuperTaluka::whereIn('id', json_decode($request->allids))->delete();
		}
	}

	public function store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = SuperTaluka::find($request->id);
			if (empty($data)) {
				$data =  new SuperTaluka();
			}
		} else {
			$data =  new SuperTaluka();
		}
		$data->name = $request->name;
		$data->district_id = $request->district_id;
		$data->save();
	}
}
