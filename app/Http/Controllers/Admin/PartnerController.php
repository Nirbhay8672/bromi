<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\SharedProperty;
use App\Models\User;
use App\Models\UserPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class PartnerController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
        // 		$this->middleware('permission:property-list', ['only' => ['index']]);
	}

	/**
	 * Find user Record in Add Partner
	 *
	 * @return \Illuminate\Http\Response JSON
	 */
	public function findUserRecords(Request $request)
	{
		$partnerEmail = $request->input('partner_email');
		$partnerNumber = $request->input('partner_number');

		$userRecords = User::where(function ($query) use ($partnerEmail, $partnerNumber) {
			$query->whereNotNull('email')
				->where('email', $partnerEmail)
				->orWhereNotNull('mobile_number')
				->where('mobile_number', $partnerNumber);
		})->get();
		return response()->json($userRecords);
	}

	/**
	 * Display Find User Records
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			// $partner = Partner::with('user')->where('partner_id', Auth::user()->id)->get();
			$partner = Partner::with('user')->where('user_id', Auth::user()->id)->get();
			return DataTables::of($partner)->addIndexColumn()
				->addColumn('partner_name', function (Partner $partner) {
					if (!empty($partner->user->first_name)) {
						return $partner->user->first_name;
					} else {
						return 'N/A';
					}
				})
				->addColumn('partner_email', function (Partner $partner) {
					if (!empty($partner->user->email)) {
						return $partner->user->email;
					} else {
						return 'N/A';
					}
				})
				->addColumn('company_name', function (Partner $partner) {
					if (!empty($partner->user->company_name)) {
						return $partner->user->company_name;
					} else {
						return 'N/A';
					}
				})
				->addColumn('partner_number', function (Partner $partner) {
					if (!empty($partner->user->mobile_number)) {
						return $partner->user->mobile_number;
					} else {
						return 'N/A';
					}
				})
				->addColumn('user_number', function (Partner $partner) {
					if (!empty(Auth::user()->mobile_number)) {
						return Auth::user()->mobile_number;
					} else {
						return 'N/A';
					}
				})
				->addColumn('action', function (Partner $partner) {
					$action  = '';
					$action .= '<i role="button" title="Delete" data-id=' . $partner->id . ' onclick="deletePartner(this)" class="fs-22 py-2 mx-2 fa-trash pointer fa text-danger" type="button"></i>';
					return $action;
				})
				->rawColumns(['action', 'partner_name', 'company_name', 'partner_email', 'partner_number', 'user_number'])
				->make(true);
		}
		return view('admin.partner.index');
	}


	/**
	 * Add Partner
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function addPartner(Request $request)
	{
		if (Auth::check()) {
			$Partner_Check = Partner::where('partner_id', $request->user_id)->first();
			if (empty($Partner_Check)) {
				$authenticatedUserId = Auth::user()->id;
				$validatedData = $request->validate([
					'user_id' => 'required|numeric',
				]);

				Partner::create([
					'user_id' => $authenticatedUserId,
					'partner_id' => $validatedData['user_id'],
					'status' => 'Pending',
				]);
				return response()->json(['message' => 'Partner added successfully', 'status' => 'sucess']);
			} else {
				return response()->json(['message' => 'Alredy Added Partner', 'status' => 'error']);
			}
		}

		return response()->json(['error' => 'Unauthorized'], 401);
	}

	/**
	 * Other Partner Requests
	 *
	 * @return \Illuminate\Http\Response JSON
	 *
	 */
    public function partnerRequest(Request $request)
	{
		if ($request->ajax()) {
			$sharedproperty = SharedProperty::with('Property', 'User')->where('user_id', Auth::user()->id)->withTrashed()->get();
// 			dd($sharedproperty);
			return DataTables::of($sharedproperty)->addIndexColumn()
				->addColumn('partner_name', function (SharedProperty $sharedproperty) {
					if (!empty($sharedproperty->User->first_name)) {
						return $sharedproperty->User->first_name;
					} else {
						return 'N/A';
					}
				})
				->addColumn('partner_email', function (SharedProperty $sharedproperty) {
					if (!empty($sharedproperty->User->email)) {
						return $sharedproperty->User->email;
					} else {
						return 'N/A';
					}
				})
				->addColumn('company_name', function (SharedProperty $sharedproperty) {
					if (!empty($sharedproperty->User->company_name)) {
						return $sharedproperty->User->company_name;
					} else {
						return 'N/A';
					}
				})
				// ->addColumn('partner_number', function (SharedProperty $sharedproperty) {
				// 	if (!empty($sharedproperty->User->mobile_number)) {
				// 		return $sharedproperty->User->mobile_number;
				// 	} else {
				// 		return 'N/A';
				// 	}
				// })
				// ->addColumn('user_number', function (SharedProperty $sharedproperty) {
				// 	if (!empty(Auth::user()->mobile_number)) {
				// 		return Auth::user()->mobile_number;
				// 	} else {
				// 		return 'N/A';
				// 	}
				// })
				->addColumn('status', function (SharedProperty $sharedproperty) {
					if ($sharedproperty->accepted == 1) {
						return 'Active';
					} else if ($sharedproperty->accepted == 2) {
						return 'Cancel';
					} else {
						return 'Pending';
					}
				})
				// ->addColumn('action', function (SharedProperty $sharedproperty) {
				// 	$action  = '';
				// 	$action .= '<i role="button" title="Delete" data-id=' . $sharedproperty->id . ' onclick="deletePartner(this)" class="fs-22 py-2 mx-2 fa-trash pointer fa text-danger" type="button"></i>';
				// 	return $action;
				// })
				->rawColumns(['partner_name', 'company_name', 'partner_email',   'status'])
				->make(true);
		}
		return view('admin.partner.partner_req');
	}
	/**
	 * Add Partner to share User Records
	 *
	 * @return \Illuminate\Http\Response JSON
	 */
	public function userPartner(Request $request)
	{
		foreach ($request->partner_id as $val) {
			try {
				SharedProperty::create([
					'partner_id' => (int)$val,
					'user_id' => Auth::user()->id,
					'property_id' => $request->property_id,
				]);
			} catch (\Exception $e) {
				dd("err", $e);
			}
		}
	}

	/**
	 * Property Index Users Records
	 *
	 * @return \Illuminate\Http\Response JSON
	 */
	public function users()
	{
		$users = Partner::with('user')->get();
		return response()->json($users);
	}

	/**
	 * Delete Partner Record
	 *
	 * @return \Illuminate\Http\Response JSON
	 */
	public function deletedPartner(Request $request)
	{
		if (!empty($request->id)) {
			$dlt_partner = Partner::where('id', $request->id)->delete();
			return json_encode($dlt_partner);
		}
	}
}
