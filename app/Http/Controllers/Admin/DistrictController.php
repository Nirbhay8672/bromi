<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DistrictController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = District::orderBy('id', 'desc')->where('user_id',Auth::user()->id)->get();
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

		return view('admin.settings.district_index');
	}

	public function saveDistrict(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = District::find($request->id);

			$exist_distrcit = District::where('name',$request->name)
				->where('id','!=',$request->id)
				->where('user_id',Auth::user()->id)
				->first();

			if($exist_distrcit) {

			} else {
				$data->fill([
					'name' => $request->name,
				])->save();
			}

		} else {
			$district = District::where('name',$request->name)->where('user_id',Auth::user()->id)->first();

			if(!$district) {
				$data = new District();
				$data->user_id = Auth::user()->id;
				$data->name = $request->name;
				$data->save();
			}
		}
	}

	public function getDistrict(Request $request)
	{
		if (!empty($request->id)) {
			$data = District::where('id', $request->id)->first()->toArray();
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = District::where('id', $request->id)->delete();
		}
	}
}
