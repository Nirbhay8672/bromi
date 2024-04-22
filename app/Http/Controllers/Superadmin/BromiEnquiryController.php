<?php

namespace App\Http\Controllers\Superadmin;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use App\Models\BromiEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
                $buttons =  $buttons . '<i data-id="' . $row->id . '" onclick=getBromiEnq(this) class="fs-22 py-2 mx-2 fa-pencil pointer fa" type="button"></i>';
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
                ->editColumn('enquiry', function ($row) {
                    if (!empty($row->enquiry)) {
                        return substr($row->enquiry, 0, 100) . '...';
                    }
                })
                ->editColumn('created_at', function ($row) {
                    if (!empty($row->created_at)) {
                        return date('d M, Y', strtotime($row->created_at));
                    }
                })
                ->editColumn('status', function ($row) {
                    if (!empty($row->status)) {
                        if ($row->status == Statuses::PENDING) {
                            return '<span style="font-size:10px;" class="bg-danger rounded-pill px-2 py-1">'. $row->status .'</span>';
                        } else if ($row->status == Statuses::READ) {
                            return '<spa style="font-size:10px;"n class="bg-warning rounded-pill px-2 py-1">'. $row->status .'</span>';
                        } else if ($row->status == Statuses::IN_PROGRESS) {
                            return '<span style="font-size:10px;" class="bg-success rounded-pill px-2 py-1">'. $row->status .'</span>';
                        } else if ($row->status == Statuses::CLOSED) {
                            return '<span style="font-size:10px;" class="bg-secondary rounded-pill px-2 py-1">'. $row->status .'</span>';
                        }
                    }
                })

                ->editColumn('Actions', function ($row) {
                    $buttons = '';
                    $buttons =  $buttons . '<span data-id="' . $row->id . '" onclick=getBromiEnq(this) class="btn rounded btn-primary" style="font-size:13px;padding:5px 7px;">View / Edit</span>';
                    if ($row->status == Statuses::PENDING) {
                        $buttons =  $buttons . ' <span data-id="' . $row->id . '" onclick=userActivate(this) class="btn rounded btn-primary" style="font-size:13px;padding:5px 7px;">Mark Read</span>';
                    } else if ($row->status == Statuses::READ) {
                        $buttons =  $buttons . ' <span data-id="' . $row->id . '" onclick=userActivate(this) class="btn rounded btn-primary" style="font-size:13px;padding:5px 7px;">Mark In-Progress</span>';
                    } else if ($row->status == Statuses::IN_PROGRESS) {
                        $buttons =  $buttons . ' <span data-id="' . $row->id . '" onclick=userActivate(this) class="btn rounded btn-primary" style="font-size:13px;padding:5px 7px;">Mark Closed</span>';
                    } 
                    return $buttons;
                })
                ->rawColumns(['enquiry', 'status', 'Actions'])
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
            if ($data->status == Statuses::PENDING) {
                $data->status =  Statuses::READ;
                $data->save();
            } else if ($data->status == Statuses::READ) {
                $data->status =  Statuses::IN_PROGRESS;
                $data->save();
            } else if ($data->status == Statuses::IN_PROGRESS) {
                $data->status =  Statuses::CLOSED;
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
        $dateTime = $request->followup_date . ' ' . $request->time . ':00';
        if (!empty($request->id) && $request->id != '') {
            $data = BromiEnquiry::find($request->id);
            $data->user_id = $loginUser->id;
            $data->super_admin_id = $loginUser->parent_id;
            $data->user_name = $request->user_name;
            $data->last_name = $request->last_name;
            $data->mobile = $request->mobile;
            $data->email = $request->email;
            $data->company = $request->company;
            $data->lead_type = $request->lead_type;
            $data->followup_date = Carbon::parse($dateTime)->format('Y-m-d H:i:s');
            $data->email = $request->email;
            $data->plan_interested_in = $request->plan_interested_in;
            $data->enquiry = $request->enquiry;
            $data->save();
        } else {
            $data =  new BromiEnquiry();
            $data->user_id = $loginUser->id;
            $data->super_admin_id = $loginUser->parent_id;
            $data->user_name = $request->user_name;
            $data->last_name = $request->last_name;
            $data->mobile = $request->mobile;
            $data->email = $request->email;
            $data->company = $request->company;
            $data->lead_type = $request->lead_type;
            $data->followup_date = Carbon::parse($dateTime)->format('Y-m-d H:i:s');
            $data->email = $request->email;
            $data->plan_interested_in = $request->plan_interested_in;
            $data->enquiry = $request->enquiry;
            $data->save();
        }
        
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
