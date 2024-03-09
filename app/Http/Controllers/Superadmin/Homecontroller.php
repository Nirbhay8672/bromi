<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Projects;
use App\Models\State;
use App\Models\Taluka;
use App\Models\TpScheme;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class Homecontroller extends Controller
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
					$buttons =  $buttons . '<i data-id="' . $row->id . '" onclick=getTp(this) class="fs-22 py-2 mx-2 fa-pencil pointer fa" type="button"></i>';
					$buttons =  $buttons . ' <i data-id="' . $row->id . '" onclick=deleteTp(this) class="fs-22 py-2 mx-2 fa-trash pointer fa text-danger" type="button"></i>';
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

			$data = User::join('roles','users.role_id','roles.id')
				->select([
					'users.id',
					'users.email',
					'users.mobile_number',
					'users.first_name AS builder_name',
					'roles.name AS role_name',
					'state.name AS state_name',
					'super_cities.name AS city_name',
				])
				->where('roles.name', 'like', '%Builder%')
				->join('state','state.id', 'users.state_id')
				->join('super_cities','super_cities.id', 'users.city_id');

			if($request->state_id > 0) {
				$data->where('state.id', $request->state_id);
			}

			if($request->city_id > 0) {
				$data->where('super_cities.id', $request->city_id);
			}
			
			$new_array = [];

			foreach ($data->get() as $user) {
				$project_count = Projects::where('user_id',$user['id'])->count();
				$user['projects_count'] = $project_count;

				array_push($new_array,$user);
			}

			return DataTables::of($new_array)->make(true);
		}

		$states = State::with(['cities'])->where('user_id',6)->get();
		
		return view('superadmin.builder.index',compact('states'));
	}
}
