<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Imports\CityImport;
use App\Imports\StateImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function stateImport(Request $request)
    {	
        Excel::import(new StateImport,$request->file('csv_file'));
        return back();
    }

	public function cityImport(Request $request)
    {	
        Excel::import(new CityImport,$request->file('csv_file'));
        return back();
    }
}
