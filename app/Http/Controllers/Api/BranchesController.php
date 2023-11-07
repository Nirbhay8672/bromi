<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\Branches;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class BranchesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index(Request $request)
	{
			$data = Branches::with('City')->orderBy('id','desc')->get();
			$perPage = $request->input('per_page', 10);
			$response = [
				'message' => 'Enquiry list has been fetched successfully.',
				'current_page' => 0, // Set the current page number here
				'total_records' => $data->count(), // Set the total number of records here
				'limit' => $perPage, // Set the limit per page here
				'data' => $data,
			];
			return response()->json($response, 200);
	}

	public function saveBranch(Request $request)
	{
		if (!empty($request->input('156')) && $request->input('156') != '') {
			$data = Branches::find($request->input('156'));
			if (empty($data)) {
				$data =  new Branches();
			}
		} else {
			$data =  new Branches();
		}
		$data->user_id = Auth::user()->id;
		$data->name = $request->input('139');
		$data->state_id = $request->input('140');
		$data->city_id = $request->input('141');
		$data->area_id = $request->input('142');
		$data->status = 1;
		$data->save();
		return response()->json([
			"status" => 200,
			"message" => "Branch Added successfully"
		]);
	}


	public function getSpecificBranch(Request $request)
	{
		if (!empty($request->input('156'))) {
			$data = Branches::where('id', $request->input('156'))->first()->toArray();
			return json_encode($data);
		}
	}


	public function destroy(Request $request)
	{
		if (!empty($request->input('156'))) {
			$data = Branches::where('id', $request->input('156'))->delete();
		}
		return response()->json([
			"status" => 200,
			"message" => "Branch Deleted successfully"
		]);

	}
}
