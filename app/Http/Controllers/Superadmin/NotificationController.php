<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Notifications;
use App\Models\User as ModelsUser;
use App\Models\UserNotifications;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Notifications::get();
			return DataTables::of($data)
				->editColumn('status', function ($row) {
					if ($row->status) {
						return 'Active';
					} else {
						return 'InActive';
					}
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<button data-id="' . $row->id . '" onclick=getNotification(this) class="btn btn-pill btn-primary" type="button">View</button>';
					$buttons =  $buttons . ' <button data-id="' . $row->id . '" onclick=deleteNotification(this) class="btn btn-pill btn-danger" type="button">Delete</button>';
					return $buttons;
				})
				->rawColumns(['Actions'])
				->make(true);
		}
		return view('superadmin.notifications.index');
	}

	public function saveNotification(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = Notifications::find($request->id);
			if (empty($data)) {
				$data =  new Notifications();
			}
		} else {
			$data =  new Notifications();
		}
		$data->message = $request->message;
		$data->status = $request->status;
		$data->save();
		$users = ModelsUser::where('role_id',1)->pluck('id')->toArray();
		foreach ($users as $key => $value) {
			UserNotifications::create(['user_id'=>$value,'notification'=>$request->message]);
		}
	}

	public function getSpecificNotification(Request $request)
	{
		if (!empty($request->id)) {
			$data =  Notifications::where('id', $request->id)->first();
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Notifications::where('id', $request->id)->delete();
		}
	}
}
