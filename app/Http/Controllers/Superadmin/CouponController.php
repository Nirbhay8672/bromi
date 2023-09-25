<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Coupons::get();
			return DataTables::of($data)
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<button data-id="' . $row->id . '" onclick=getCoupon(this) class="btn btn-pill btn-primary" type="button">View</button>';
					$buttons =  $buttons . ' <button data-id="' . $row->id . '" onclick=deleteCoupon(this) class="btn btn-pill btn-danger" type="button">Delete</button>';
					return $buttons;
				})
				->rawColumns(['Actions'])
				->make(true);
		}
		return view('superadmin.coupons.index');
	}

	public function saveCoupon(Request $request)
	{
		if (!empty($request->id) && $request->id != '') {
			$data = Coupons::find($request->id);
			if (empty($data)) {
				$data =  new Coupons();
			}
		} else {
			$data =  new Coupons();
		}
		$data->name = $request->name;
		$data->code = $request->code;
		$data->amount_off = $request->amount_off;
		$data->status = $request->status;
		$data->save();
	}

	public function getSpecificCoupon(Request $request)
	{
		if (!empty($request->id)) {
			$data =  Coupons::where('id', $request->id)->first();
			return json_encode($data);
		}
	}

	public function destroy(Request $request)
	{
		if (!empty($request->id)) {
			$data = Coupons::where('id', $request->id)->delete();
		}
	}
}
