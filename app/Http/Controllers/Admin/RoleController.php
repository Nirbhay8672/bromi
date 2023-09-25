<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Role::where('user_id', Session::get('parent_id'))->get();
			return DataTables::of($data)
				->editColumn('name', function ($row) {
					if (str_contains($row->name, '_---_')) {
						$name = explode('_---_', $row->name);
						return $name[0];
					}
					return $row->name;
				})
				->editColumn('Actions', function ($row) {
					$rolename ='';
					if (str_contains($row->name, '_---_')) {
						$name = explode('_---_', $row->name);
						$rolename = $name[0];
					}

					$buttons = '';
						$buttons =  $buttons . '<i role="button" title="Edit" data-id="' . $row->id . '" onclick=getRole(this) class="fa-pencil pointer fa fs-22 py-2 mx-2  " type="button"></i>';
			
						$buttons =  $buttons . '<i role="button" title="Delete" data-id="' . $row->id . '" onclick=deleteRole(this) class="fa-trash pointer fa fs-22 py-2 mx-2 text-danger" type="button"></i>';
					
					return $buttons;
				})
				->rawColumns(['Actions'])
				->make(true);
		}
		$permissions = Permission::get();
		return view('admin.roles.index', compact('permissions'));
	}

	public function saveRole(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
		
			$data = Role::find($request->id);
			if (empty($data)) {
				$data =  new Role();
			}
		} else {
			$data =  new Role();
		}
		if (!empty($request->name)) {
			$data->name = $request->name . '_---_' . Session::get('parent_id');
			$data->user_id = Session::get('parent_id');
			$data->save();
			$data->syncPermissions($request->input('permission'));
		}
	}

	public function getSpecificRole(Request $request)
	{
		if (!empty($request->id)) {
			$role = Role::find($request->id);
			$permission = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
				->where("role_has_permissions.role_id", $request->id)
				->get();
			$data['role'] = $role;
			$data['permission'] = $permission;
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Role::where('id', $request->id)->delete();
		}
	}
}
