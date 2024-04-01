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
				->editColumn('is_active', function ($row) {

					$status = $row->status == 1 ? 'checked' : '';

					$switch_button = '';
					$switch_button = '<div class="media-body text-center icon-state">
						<label class="switch mb-0">
							<input type="checkbox" onchange="updateStatus(this ,'. $row->id . ')" id="area_active" data-bs-original-title="" title="" '. $status .'>
							<span class="switch-state"></span>
						</label>
					</div>';
					
					return $switch_button;
				})
				->editColumn('Actions', function ($row) {
					$buttons = '';
					$buttons =  $buttons . '<i data-id="' . $row->id . '" onclick=getCoupon(this) class="fs-22 py-2 mx-2 fa-pencil pointer fa" type="button"></i>';
					$buttons =  $buttons . ' <i data-id="' . $row->id . '" onclick=deleteCoupon(this) class="fs-22 py-2 mx-2 fa-trash pointer fa text-danger" type="button"></i>';
					return $buttons;
				})
				->rawColumns(['Actions', 'is_active'])
				->make(true);
		}
		return view('superadmin.coupons.index');
	}

	public function updateStatus(Request $request) 
	{
		$coupon = Coupons::find($request->id);

		$coupon->fill([
			'status' => $coupon->status == 0 ? 1 : 0 
		])->save();
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
