<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use App\Models\UserPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
{

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
	 * Display Partner Records
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$partner = Partner::with('user')->get();
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
		Partner::create([
			'user_id' => Auth::user()->id,
			'partner_id' => $request->user_id,
			'status' => 'Pending',
		]);
	}

	/**
	 * Partner Accept Request
	 *
	 * @return \Illuminate\Http\Response JSON
	 */
	public function partnerRequest(Request $request)
	{
		return view('admin.partner.partner_req');
	}

	/**
	 * Add Partner to share User Records
	 *
	 * @return \Illuminate\Http\Response JSON
	 */
	public function userPartner(Request $request)
	{
		$userIds = json_encode($request->user_id);
		// dd("user partner", $userIds);

		UserPartner::create([
			'user_id' => '1',
			'property_id' => $request->property_id
		]);
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
