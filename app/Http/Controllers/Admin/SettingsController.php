<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Builders;
use App\Models\City;
use App\Models\DropdownSettings;
use App\Models\Subcategory;
use App\Models\State;
use App\Models\SuperAreas;
use App\Models\SuperCity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Rap2hpoutre\FastExcel\FastExcel;
use DB;


class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function cities_index(Request $request)
	{
		if ($request->ajax()) {
			$data = City::with('State')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
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
				->rawColumns(['Actions', 'select_checkbox'])
				->make(true);
		}
		$states = State::orderBy('name')->get();;
		return view('admin.settings.city_index', compact('states'));
	}

	public function getCityForImport(Request $request)
	{
		return response()->json([
			'message' => 'Detail fetch',
			'data' => [
				'city_data' => SuperCity::where('state_id',$request->state_id)->get()	
			]
		]);
	}


	public function getAreaForImport(Request $request)
	{
		return response()->json([
			'message' => 'Detail fetch',
			'data' => [
				'area_data' => SuperAreas::where('super_city_id',$request->city_id)->get()	
			]
		]);
	}

	public function get_city(Request $request)
	{
		if (!empty($request->id)) {
			$data =  City::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function cities_destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = City::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0])) {
			$data = City::whereIn('id', json_decode($request->allids))->delete();
		}
	}

	public function cities_store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = City::find($request->id);
			if (empty($data)) {
				$data =  new City();

				$city = City::where('name',$request->name)->where('id','!=',$data->id)->where('user_id',Auth::user()->id)->first();

				if(!$city) {
					$data->name = $request->name;
					$data->state_id = $request->state_id;
					$data->save();
				}
			}
		} else {
			$city = City::where('name',$request->name)->where('user_id',Auth::user()->id)->first();

			if(!$city) {
				$data =  new City();
				$data->user_id = Auth::user()->id;
				$data->name = $request->name;
				$data->state_id = $request->state_id;
				$data->save();
			}
		}
	}

	public function cities_import(Request $request)
	{
		$file = $request->file('csv_file');
		$name = Str::random(10) . '.csv';
		$file->move(storage_path('app'), $name);
		try {
			$collection = (new FastExcel)->import(storage_path('app/' . $name));
		} catch (\Throwable $th) {
			$collection = [];
		}
		unlink(storage_path('app/' . $name));
		$cities = City::all()->pluck('name')->all();
		$cities = array_map('strtolower', $cities);
		foreach ($collection as $key => $value) {
			if (!in_array(strtolower($value['name']), $cities)) {
				Helper::add_city($value['name']);
			}
		}
	}


	public function builder_import(Request $request)
	{
		$file = $request->file('csv_file');
		$name = Str::random(10) . '.csv';
		$file->move(storage_path('app'), $name);
		try {
			$collection = (new FastExcel)->import(storage_path('app/' . $name));
		} catch (\Throwable $th) {
			$collection = [];
		}
		unlink(storage_path('app/' . $name));
		$builders = Builders::all()->pluck('name')->all();
		$builders = array_map('strtolower', $builders);
		foreach ($collection as $key => $value) {
			if (!in_array(strtolower($value['name']), $builders)) {
				Helper::add_builder($value['name']);
			}
		}
	}

	public function state_import(Request $request)
	{
		$file = $request->file('csv_file');
		$name = Str::random(10) . '.csv';
		$file->move(storage_path('app'), $name);
		try {
			$collection = (new FastExcel)->import(storage_path('app/' . $name));
		} catch (\Throwable $th) {
			$collection = [];
		}
		unlink(storage_path('app/' . $name));
		$states = State::all()->pluck('name')->all();
		$states = array_map('strtolower', $states);
		foreach ($collection as $key => $value) {
			if (!in_array(strtolower($value['name']), $states)) {
				Helper::add_state($value['name']);
			}
		}
	}

	public function states_index(Request $request)
	{
		if ($request->ajax()) {
			$data = State::orderBy('id', 'desc')->where('user_id',Auth::user()->id)->get();
			return DataTables::of($data)
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Edit" onclick=getState(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Delete" onclick=deleteState(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					return $buttons;
				})
				->rawColumns(['Actions'])
				->make(true);
		}
		return view('admin.settings.state_index');
	}

	public function get_state(Request $request)
	{
		if (!empty($request->id)) {
			$data =  State::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function states_destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = State::where('id', $request->id)->delete();
		}
	}

	public function states_store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = State::find($request->id);
			if (empty($data)) {
				$data =  new State();

				$state = State::where('name',$request->name)->where('id','!=',$data->id)->where('user_id',Auth::user()->id)->first();

				if(!$state) {
					$data->name = $request->name;
					$data->save();
				}
			}
		} else {
			$state = State::where('name',$request->name)->where('user_id',Auth::user()->id)->first();

			if(!$state) {
				$data =  new State();
				$data->user_id = Auth::user()->id;
				$data->name = $request->name;
				$data->save();
			}
		}
	}

	public function builder_index(Request $request)
	{
		if ($request->ajax()) {
			$data = Builders::orderBy('id', 'desc')->get();
			return DataTables::of($data)
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Edit" onclick=getBuilder(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';
					$buttons =  $buttons . '<i role="button" data-id="' . $row->id . '" title="Delete" onclick=deleteBuilder(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					return $buttons;
				})
				->editColumn('select_checkbox', function ($row) {
					$abc = '<div class="form-check checkbox checkbox-primary mb-0">
					<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
					<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
					  </div>';
					return $abc;
				})
				->rawColumns(['Actions', 'select_checkbox'])
				->make(true);
		}
		return view('admin.settings.builder_index');
	}

	public function get_builder(Request $request)
	{
		if (!empty($request->id)) {
			$data =  Builders::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function builder_destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Builders::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0])) {
			$data = Builders::whereIn('id', json_decode($request->allids))->delete();
		}
	}

	public function builder_store(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = Builders::find($request->id);
			if (empty($data)) {
				$data =  new Builders();
			}
		} else {
			$data =  new Builders();
		}
		$data->user_id = Session::get('parent_id');
		$data->name = $request->name;
		$data->save();
	}

	public function enquiry_configuration(Request $request)
	{
		$type = 'Enquiry Configuration';
		return view('admin.settings.enquiry_dropdown_settings', compact('type'));
	}

	public function building_configuration(Request $request)
	{
		$type = 'Building Configuration';
		return view('admin.settings.building_dropdown_settings', compact('type'));
	}

	public function property_configuration(Request $request)
	{
		$type = 'Property Configuration';
		return view('admin.settings.property_dropdown_settings', compact('type'));
	}

	public function save_settings_configuration(Request $request)
	{
		if (!empty($request->name) && !empty($request->dropdown_for)) {
			if (!empty($request->id)) {
				$data = DropdownSettings::find($request->id);
			} else {
				$data = new DropdownSettings();
			}
			$data->parent_id = $request->parent_id;
			$data->name = $request->name;
			$data->user_id = Session::get('parent_id');
			$data->dropdown_for = $request->dropdown_for;
			$data->save();
		}
	}

	public function save_settings_configuration1(Request $request)
	{
		if (!empty($request->name) && !empty($request->dropdown_for)) {
			if (!empty($request->id)) {
				$data = Subcategory::find($request->id);
			} else {
				$data = new Subcategory();
			}
			$data->cat_id = $request->parent_id;
			$data->name = $request->name;
			$data->user_id = Session::get('parent_id');
			//$data->dropdown_for = $request->dropdown_for;
			$data->save();
		}
	}
	public function get_settings_configuration(Request $request)
	{
		if (!empty($request->type)) {
			$type = $request->type . '_';
			$datas = DropdownSettings::where('dropdown_for', 'like', '%' . $type . '%')->get()->toArray();
			foreach ($datas as $key => $value) {
				if (substr($value['dropdown_for'], 0, strlen($type)) != $type) {
					unset($datas[$key]);
				}
			}
			if (!empty($datas)) {
				return json_encode($datas);
			}
			return '';
		}
	}
	public function get_subcategory(Request $request)
	{
		if (!empty($request->type)) {
			$datas = Subcategory::get()->toArray();
			$datas1 = DB::select("select * from `subcategory` where `user_id` is null");
			$data = array_merge($datas, $datas1);
			if (!empty($data)) {
				return json_encode($data);
			}
			return '';
		}
	}

	public function delete_settings_configuration(Request $request)
	{
		if (!empty($request->id)) {
			$datas = DropdownSettings::find($request->id);
			if (!empty($datas)) {
				$datas->delete();
			}
		}
	}
	public function delete_settings_configuration1(Request $request)
	{
		if (!empty($request->id)) {
			$datas = Subcategory::find($request->id);
			if (!empty($datas)) {
				$datas->delete();
			}
		}
	}
}
