<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Auth;
// use Validator;
use App\Models\City;
use App\Models\State;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\VerificationToken;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'mobile_number' => 'required|string',
                'company_name' => 'required|string',
                'role_id' => 'required|string',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required_with:password|same:password',
            ]);

            // If validation fails, return the error response
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'data' => $validator->errors(),
                ], 422);
            }

            $verifitoken = rand(1000,9999);
            $user = User::create([
                "first_name"=> $request->first_name,
                "last_name"=> $request->last_name,
                'email' => $request->email,
                "mobile_number"=> $request->mobile_number,
                "company_name"=> $request->company_name,
                "role_id"=> $request->role_id,
                "state_id"=> $request->state_id,
                "city_id"=> $request->city_id,
                'password' => Hash::make($request->password),
                'verification_token' => $verifitoken,
             ]);
            
            $token = $user->createToken('auth_token')->plainTextToken;
            //       VerificationToken::create([
            //     'token' => $verifitoken,
            //     'user_id' => $user->id,
            // ]);
        Mail::raw("Dear User,\n\nYour verification token is: $verifitoken\n\nPlease use this token for verification purposes.", function ($message) use ($user) {
            $message->from('mrweb1119@gmail.com')
            ->to($user->email)
                    ->subject('Verification Token');
        });
    
                    return response()->json(["status"=> 200,
                        "message"=>"Registration successful. Please verify your email.",
                        "data"=> $user]);
                    // return response()
                    //     ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
        } catch (\exception $e) {
            dd($e);
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => null,
            ], 500);
            //throw $th;
        }
        

        
    }

     public function verifyToken(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'token' => 'required',
        ]);
        $user = User::where('verification_token', $request->token)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid verification token.'], 404);
        }

        $user->is_verified = 1;
        $user->verification_token = null;
        $user->save();

        return response()->json(['message' => 'User successfully verified.'], 200);
    }

    public function login(Request $request)
    {


        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }else{
            $user = User::where('email', $request['email'])->firstOrFail();
            //  $tokenAuth=DB::table('verification_tokens')
            //  ->where('user_id',$user->id)
            //  ->first();
           if(!empty($user->is_verified)){

               $token = $user->createToken('auth_token')->plainTextToken;
               $data=auth()->user();
               $data['token']=$token;
               $data['token_type']="Bearer";
               return response()->json(["status"=> 200,
               "data"=> $data]);
           }else{
             return response()->json(['error' => 'Your email is not verified.'], 403);
           }
            
            
        }

        
    }
    public function generateToken(Request $request)
    {
        
        $request->validate([
            'id' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $token = rand(1000,9999);

        VerificationToken::create([
            'token' => $token,
            'user_id' => $user->id,
        ]);
        Mail::raw("Dear User,\n\nYour verification token is: $token\n\nPlease use this token for verification purposes.", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Verification Token');
        });


        return response()->json(['message' => 'Verification token generated successfully']);
    }


    public function getstate()
    {
        try {
            $state=State::all();
       return response()->json(["status"=> 200,
                        "message"=>"State List",
                        "data"=> $state]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
        }
       
    }

    public function getcity(Request $request)
    {
         $state_id = $request->input('id');

        try {
            $cities = City::where('state_id', $state_id)->get();
            return response()->json([
                "status" => 200,
                "message" => "City List",
                "data" => $cities
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
        }
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        try {
            // $request->validate([
            //     'email' => 'required|email|exists:users',
            // ]);
    
            $user = User::where('email', $request->email)->first();
    
            $token = Str::random(15);
            PasswordReset::updateOrCreate(
                ['email' => $user->email],
                ['token' => $token]
            );
            Mail::send([], [], function ($message) use ($user, $token) {
                $message->to($user->email)
                        ->subject('Reset Your Password')
                        ->setBody("Click the link below to reset your password:\n\n" . url("api/reset-password")."<br> $token");
            });
            return response()->json(["status"=> 200,
            "message"=>"Password reset link sent successfully",
            "data"=> $token]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(["status"=> 500,
            "message"=>"Error",
            "data"=> $e]);
        }
        
        // return response()->json(['message' => 'Password reset link sent successfully','token' => $token]);
    }

    public function reset(Request $request)
    {
        try {
            $passwordReset = PasswordReset::where('email', $request->email)
                ->where('token', $request->token)
                ->first();
            if (!$passwordReset) {
                return response()->json(['message' => 'Invalid reset token'], 422);
            }
    
            $user = User::where('email', $request->email)->first();
    
            $user->update([
                'password' => Hash::make($request->password)
            ]);
    
            $passwordReset->delete();
            return response()->json(["status"=> 200,
            "message"=>"Password reset successful",
            "data"=> ""]);
        } catch (\Exception $e) {
           
            return response()->json(["status"=> 401,
            "message"=>"Error",
            "data"=> $e]);
        }
        
    }
    
    
    // method for user logout and delete token
    public function profile()
    {
        return response()->json(["status"=> 200,
                        "message"=>"Profile Details",
                        "data"=> auth()->user()]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
