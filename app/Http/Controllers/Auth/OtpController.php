<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Session;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function showOtpForm()
	{
		return view('admin.auth.otp_form');
	}

    public function otpVerification(Request $request)
    {
        $otp = Otp::where('user_id',Session::get('user_id'))
            ->where('otp',$request->otp)
            ->first();
        
        $user = User::find(Session::get('user_id'));
            
        if($otp)
        {
            $otp->delete();
            $user->fill([
                'email_verified_at' =>  Carbon::now(),
                'email_verified' => 1,
            ])->save();
            
            Session::forget('user_id');
            return redirect('admin/login')->with('success','Email verify successfully!');
        }
        else
        {
            $user->Forcedelete();
            Session::forget('user_id');
            return redirect()->route('admin.register')->with('error','Email verification failed!');
        }
    }
}
