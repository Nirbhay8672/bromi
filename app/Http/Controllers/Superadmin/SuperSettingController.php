<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\State;
use App\Models\SuperAreas;
use App\Models\SuperCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class SuperSettingController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function cities_index(Request $request)
	{
		if ($request->ajax()) {
			$data = SuperCity::with('State')->orderBy('id','desc')->get();
			return DataTables::of($data)
			->editColumn('select_checkbox', function ($row) {
				$abc = '<div class="form-check checkbox checkbox-primary mb-0">
				<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
				<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  </div>';
				return $abc;
			})
				->editColumn('state_id', function ($row) {
					if (!empty($row->State->name)) {
						return $row->State->name;
					}
					return '';
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Edit" onclick=getCity(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Delete" onclick=deleteCity(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					return $buttons;
				})
				->rawColumns(['Actions','select_checkbox'])
				->make(true);
		}
		$states = State::orderBy('name')->get();;
		return view('superadmin.supersettings.super_city_index',compact('states'));
	}

	public function get_city(Request $request)
	{
		if (!empty($request->id)) {
			$data =  SuperCity::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function cities_destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = SuperCity::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0]) ) {
			$data = SuperCity::whereIn('id', json_decode($request->allids))->delete();
		}
	}

	public function cities_store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = SuperCity::find($request->id);
			if (empty($data)) {
				$data =  new SuperCity();
			}
		} else {
			$data =  new SuperCity();
		}
		$data->name = $request->name;
		$data->state_id = $request->state_id;
		$data->save();
	}

	public function area_index(Request $request)
	{
		if ($request->ajax()) {
			$data = SuperAreas::with('City', 'State')->orderBy('id','desc')->get();

			return DataTables::of($data)
			->editColumn('select_checkbox', function ($row) {
				$abc = '<div class="form-check checkbox checkbox-primary mb-0">
				<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
				<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  </div>';
				return $abc;
			})
				->editColumn('city', function ($row) {
					if (isset($row->City->name)) {
						return $row->City->name;
					}
					return '';
				})
				->editColumn('state', function ($row) {
					if (isset($row->State->name)) {
						return $row->State->name;
					}
					return '';
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
						$buttons =  $buttons . '<i role="button" title="Edit" data-id="' . $row->id . '" onclick=getArea(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';

						$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteArea(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					return $buttons;
				})
				->rawColumns(['Actions','select_checkbox'])
				->make(true);
		}
		$cities = SuperCity::orderBy('name')->get()->toArray();
		$states = State::orderBy('name')->get()->toArray();
		return view('superadmin.supersettings.super_area_index', compact('cities', 'states'));
	}

	public function area_store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = SuperAreas::find($request->id);
			if (empty($data)) {
				$exist = SuperAreas::where('name',$request->name)->where('super_city_id',$request->super_city_id)->first();
				if (!empty($exist)) {
					return;
				}
				$data =  new SuperAreas();
			}
		} else {
			$exist = SuperAreas::where('name',$request->name)->where('super_city_id',$request->super_city_id)->first();
			if (!empty($exist)) {
				return;
			}
			$data =  new SuperAreas();
		}
		$data->name = $request->name;
		$data->super_city_id = $request->super_city_id;
		$data->pincode = $request->pincode;
		$data->state_id = $request->state_id;
		$data->save();
	}



	public function get_area(Request $request)
	{
		if (!empty($request->id)) {
			$data = SuperAreas::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function area_delete(Request $request)
	{
		if (!empty($request->id)) {
			$data = SuperAreas::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0]) ) {
			$data = SuperAreas::whereIn('id', json_decode($request->allids))->delete();
		}
	}
}
