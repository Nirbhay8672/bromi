<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Taluka;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class VillageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Village::with('Taluka', 'District')->when($request->go_data_id, function ($query) use ($request) {
				return $query->where('id', $request->go_data_id);
			})->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();

			return DataTables::of($data)
			->editColumn('select_checkbox', function ($row) {
				$abc = '<div class="form-check checkbox checkbox-primary mb-0">
				<input class="form-check-input table_checkbox" data-id="' . $row->id . '" name="select_row[]" id="checkbox-primary-' . $row->id . '" type="checkbox">
				<label class="form-check-label" for="checkbox-primary-' . $row->id . '"></label>
				  </div>';
				return $abc;
			})
				->editColumn('taluka', function ($row) {
					if (isset($row->Taluka->name)) {
						return $row->Taluka->name;
					}
					return '';
				})
				->editColumn('district', function ($row) {
					if (isset($row->District->name)) {
						return $row->District->name;
					}
					return '';
				})
				->editColumn('status', function ($row) {
					if ($row->status) {
						return 'active';
					} else {
						return 'not active';
					}
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
		$districts = District::orderBy('name')->where('user_id',Auth::user()->id)->get()->toArray();
		$talukas = Taluka::orderBy('name')->where('user_id',Auth::user()->id)->get()->toArray();
		return view('admin.settings.village_index',compact('districts','talukas'));
	}

	public function saveVillage(Request $request)
	{
		if (!empty($request->id) && $request->id != '')
		{
			$data = Village::find($request->id);
			if (empty($data)) {
				$exist = Village::where('name',$request->name)->where('taluka_id',$request->taluka_id)->first();
				if (!empty($exist)) {
					return;
				}
				$data =  new Village();
			}
		}
		else
		{
			$exist = Village::where('name',$request->name)->where('taluka_id',$request->taluka_id)->first();
			if (!empty($exist)) {
				return;
			}
			$data =  new Village();
		}
		$data->user_id = Auth::user()->id;
		$data->name = $request->name;
		$data->taluka_id = $request->taluka_id;
		$data->district_id = $request->district_id;
		$data->status = $request->status;
		$data->save();
	}

	public function getVillage(Request $request)
	{
		if (!empty($request->id)) {
			$data = Village::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Village::where('id', $request->id)->delete();
		}
		if (!empty($request->allids) && isset(json_decode($request->allids)[0]) ) {
			$data = Village::whereIn('id', json_decode($request->allids))->delete();
		}
	}
}
