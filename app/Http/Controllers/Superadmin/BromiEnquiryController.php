<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\BromiEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BromiEnquiryController extends Controller
{

    public function __construct()
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
            $user = Auth::user();
            $data = BromiEnquiry::where('user_id', $user->id)->get();
            return DataTables::of($data)
            ->editColumn('created_at', function ($row) {
                if (!empty($row->created_at)) {
                    return date('d M, Y', strtotime($row->created_at));
                }
            })
            ->editColumn('status', function ($row) {
                if (!empty($row->status)) {
                    if ($row->status == 'pending') {
                        return '<span class="bg-warning rounded-pill px-2 py-1">' . $row->status . '</span>';
                    } else {
                        return '<span class="bg-success rounded-pill px-2 py-1">' . $row->status . '</span>';
                    }
                }
            })

            ->editColumn('Actions', function ($row) {
                $buttons = '';
                $buttons =  $buttons . '<button data-id="' . $row->id . '" onclick=getBromiEnq(this) class="btn btn-pill btn-primary" type="button">View</button>';
                return $buttons;
            })
            ->rawColumns(['status', 'Actions'])
            ->make(true);
        }
        return view('superadmin.requests.index');
    }

    public function superadminList(Request $request)
    {
        if ($request->ajax()) {
            $user = Auth::user();
            $data = BromiEnquiry::get();
            return DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    if (!empty($row->created_at)) {
                        return date('d M, Y', strtotime($row->created_at));
                    }
                })
                ->editColumn('status', function ($row) {
                    if (!empty($row->status)) {
                        if ($row->status == 'pending') {
                            return '<span class="bg-warning rounded-pill px-2 py-1">'. $row->status .'</span>';
                        } else {
                            return '<span class="bg-success rounded-pill px-2 py-1">'. $row->status .'</span>';
                        }
                    }
                })

                ->editColumn('Actions', function ($row) {
                    $buttons = '';
                    $buttons =  $buttons . '<button data-id="' . $row->id . '" onclick=getBromiEnq(this) class="btn btn-pill btn-primary" type="button">View</button>';
                    if ($row->status == 'pending') {
                        # code...
                        $buttons =  $buttons . ' <button data-id="' . $row->id . '" onclick=userActivate(this) class="btn btn-pill btn-primary" type="button">Mark Read</button>';
                    }
                    return $buttons;
                })
                ->rawColumns(['status', 'Actions'])
                ->make(true);
        }
        return view('superadmin.requests.super-admin-index');
    }

    /**
     * change enquiry status.
     */
    public function changeStatus(Request $request)
    {
        if (!empty($request->id)) {
            $data = BromiEnquiry::find($request->id);
            if (!empty($data)) {
                $data->status =  'read';
                $data->save();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loginUser = Auth::user();
        $data =  new BromiEnquiry();
        $data->user_id = $loginUser->id;
        $data->user_name = $loginUser->first_name . ' ' . $loginUser->last_name;
        $data->enquiry = $request->enquiry;
        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BromiEnquiry  $bromiEnquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (!empty($request->id)) {

            $bromEnq = BromiEnquiry::where('id', $request->id)->first()->toArray();

            $data = [
                'brom_enq' => $bromEnq,
            ];

            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BromiEnquiry  $bromiEnquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(BromiEnquiry $bromiEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BromiEnquiry  $bromiEnquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BromiEnquiry $bromiEnquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BromiEnquiry  $bromiEnquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(BromiEnquiry $bromiEnquiry)
    {
        //
    }
}
