<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Taluka;
use App\Models\TpScheme;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Request $request)
	{
		try {
			if (Auth::check()) {
				if ($request->ajax()) {
					$data = User::get();
					return DataTables::of($data)
						->editColumn('Actions', function ($row) {
							$buttons = '';
							$buttons =  $buttons . '<button data-id="' . $row->id . '" onclick=getUser(this) class="btn btn-pill btn-primary" type="button">View</button>';
							$buttons =  $buttons . ' <button data-id="' . $row->id . '" onclick=deleteUser(this) class="btn btn-pill btn-danger" type="button">Delete</button>';
							return $buttons;
						})
						->rawColumns(['Actions'])
						->make(true);
				}
				$roles =  Role::where('user_id')->get();
				return view('superadmin.users.index', compact('roles'));
			}
			return redirect()->route('admin.login');
		} catch (Throwable $e) {
			return redirect()->back()->with('error', trans('app.something_went_wrong'));
		}
	}

	public function tpSchemeIndex(Request $request)
	{
		if ($request->ajax()) {
			$data = TpScheme::get();
			return DataTables::of($data)
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<button data-id="' . $row->id . '" onclick=getTp(this) class="btn btn-pill btn-primary" type="button">View</button>';
					$buttons =  $buttons . ' <button data-id="' . $row->id . '" onclick=deleteTp(this) class="btn btn-pill btn-danger" type="button">Delete</button>';
					return $buttons;
				})
				->rawColumns(['Actions'])
				->make(true);
		}
		$districts =  District::get();
		$talukas =  Taluka::get();
		$villages =  Village::get();

		return view('superadmin.tpscheme.index', compact('districts','talukas','villages'));
	}

	public function getTpScheme(Request $request)
	{
		if (!empty($request->id)) {
			$data =  TpScheme::where('id', $request->id)->first();
			return json_encode($data);
		}
	}

	public function deleteScheme(Request $request)
	{
		if (!empty($request->id)) {
			$data = TpScheme::where('id', $request->id)->delete();
		}
	}

	public function saveScheme(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = TpScheme::find($request->id);
			if (empty($data)) {
				$data =  new TpScheme();
			}
		} else {
			$data =  new TpScheme();
		}
		$data->name = $request->name;
		$data->villages = $request->villages;
		$data->save();
	}

	public function builders(Request $request)
	{
		if ($request->ajax()) {
			$data = User::select([
				'users.id',
				'roles.name as role_name',
				'users.mobile_number',
				'users.email',
				DB::raw("CONCAT(users.first_name,' ',users.last_name) as builder_name")
			])->withCount('projects')->join('roles','roles.id','users.role_id')->where('roles.name','like', '%' . "Builder" . '%')->get();

			return DataTables::of($data)->make(true);
		}
		
		return view('superadmin.builder.index');
	}
}
