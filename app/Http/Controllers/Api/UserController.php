<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Contact;
use App\Jobs\SendEmailJob;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use JWTAuth, JWTAuthException;

class UserController extends Controller
{
    /**
     * Login based on following parameter
     * URL: http://localhost/zego/public/api/login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
                //'fcm_token' => 'required',
                // 'plateform' => 'required', // android, iOS
            ], [
                'email.required' => trans('app.Please_enter_a_email_address'),
                'password.required' => trans('app.Please_enter_a_password'),
            ]);
            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $credentials = $request->only('email', 'password');
            $token = null;

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('app.Invalid_password_Please_try_again'),
                        'result' => null
                    ]
                );
            }

            if (!is_null($token)) {
                $user = JWTAuth::user($token);
                if ($user->role_id == 2) {
                    if ($user->status == 0) {
                        return response()->json(
                            [
                                'status' => 0,
                                'message' => trans('auth.Your_account_is_not_activated_please_activated_first'),
                                'result' => null
                            ]
                        );
                    } else if ($user->status == 2) {
                        return response()->json(
                            [
                                'status' => 0,
                                'message' => trans('auth.Your_account_is_not_deactivated'),
                                'result' => null
                            ]
                        );
                    } else {
                        $nuser = Helper::getUsers(['id' => $user->id]);

                        if ($request->fcm_token != "" && $request->plateform != "") {
                            $nuser->userLoginDevices()->updateOrCreate(
                                [
                                    'fcm_token' => $request->fcm_token, 'is_signout'  => 0
                                ],
                                [
                                    'plateform'  => $request->plateform,
                                    'device_model'  => $request->device_model,
                                    'login_date'  => date('Y-m-d H:i:s'),
                                    'device_manufacture'  => null
                                ]
                            );
                        }

                        //$nuser['is_email_verified'] = $nuser->email_verified_at != null ? 1 : 0;
                        $nuser['is_profile_complete'] = $nuser->name != null ? 1 : 0;
                        $nuser['token'] = $token;

                        $message = trans('auth.Logged_in_successfully');
                        return response()->json(
                            [
                                'status' => 200,
                                'message' => $message,
                                'result' => $nuser
                            ]
                        );
                    }
                } else {
                    return response()->json(
                        [
                            'status' => 0,
                            'message' => trans('auth.sufficient_permissions_app'),
                            'result' => null
                        ]
                    );
                }
            }
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        } catch (JWTAuthException $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Register based on following parameter
     * URL: http://localhost/zego/public/api/register
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request)
    {
        try {
            $request->merge(['phone_number' => preg_replace('/^0?/', "", $request->phone_number)]);
            $validator = Validator::make(
                $request->all(),
                [
                    'country_id' => 'required|integer',
                    'name' => 'required|max:255',
                    'email' => ['required', 'email', 'unique:users,email,null,id,deleted_at,NULL'],
                    'password' => 'required|min:8|max:15',
                ],
                [
                    'country_id.required' => trans('app.Please_select_a_country'),
                    'name.required' => trans('app.Please_enter_full_name'),
                    'email.required' => trans('app.Please_enter_a_email_address'),
                    'email.email' => trans('app.Please_enter_a_valid_email_address'),
                    'postcode.required' => trans('app.Please_enter_a_postcode'),
                    'password.required' => trans('app.Please_enter_a_password'),
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country_id' => $request->country_id,
                'phone_number' => $request->phone_number,
                'postcode' => $request->postcode,
                'is_active' => 1,
                'role_id' => 2,
            ];

            $user = User::create($user_data);

            if ($user) {
                if ($request->fcm_token != "" && $request->plateform != "") {
                    $user->userLoginDevices()->updateOrCreate(
                        [
                            'fcm_token' => $request->fcm_token,
                            'is_signout'  => 0
                        ],
                        [
                            'plateform'  => $request->plateform,
                            'device_model'  => $request->device_model,
                            'login_date'  => date('Y-m-d H:i:s'),
                            'device_manufacture'  => $request->device_manufacture
                        ]
                    );
                }

                $user = Helper::getUsers(['id' => $user->id]);
                $credentials = $request->only('email', 'password');
                $token = null;

                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json(
                        [
                            'status' => 0,
                            'message' => trans('app.Invalid_password_Please_try_again'),
                            'result' => null
                        ]
                    );
                }
                $user['token'] = $token;

                $mail_data = [
                    'email_id' => 3,
                    'user_id' => $user->id,
                    'email' => $user->email,
                ];

                dispatch(new SendEmailJob($mail_data));

                return response()->json(
                    [
                        'status' => 200,
                        'message' => trans('app.Registraion_has_been_completed_successfully'), 'result' => $user
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('app.something_went_wrong'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Logout based on following parameter
     * URL: http://localhost/zego/public/api/logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'plateform' => 'required', // android, iOS
                    'fcm_token' => 'required',
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user = JWTAuth::user($request->token);
            if ($request->plateform != "" && $request->fcm_token != "") {
                $user->userLoginDevices()->where(
                    [
                        'fcm_token' => $request->fcm_token,
                        'plateform' => $request->plateform
                    ]
                )->update(
                    [
                        'logout_date'  => date('Y-m-d H:i:s'),
                        'is_signout'  => 1
                    ]
                );
            }
            $user = JWTAuth::invalidate($request->token);
            return response()->json(
                [
                    'status' => 200,
                    'message' => trans('auth.Logged_out_successfully'),
                    'result' => null
                ]
            );
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Forgot password based on following parameter
     * URL: http://localhost/zego/public/api/forgot_password
     *
     * @param  mixed $request
     * @return void
     */
    public function forgotPassword(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                ],
                [
                    'email.required' => trans('app.Please_enter_a_email_address'),
                    'email.email' => trans('app.Please_enter_a_valid_email_address'),
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                if ($user->status == 0) {
                    return response()->json(
                        [
                            'status' => 0,
                            'message' => trans('auth.Your_account_is_not_activated_please_activated_first'),
                            'result' => null
                        ]
                    );
                } else if ($user->status == 2) {
                    return response()->json(
                        [
                            'status' => 0,
                            'message' => trans('auth.Your_account_is_not_deactivated'),
                            'result' => null
                        ]
                    );
                } else {
                    $code = mt_rand(111111, 999999);

                    $user->reset_code = $code;
                    $user->save();

                    $mail_data = [
                        'email_id' => 2,
                        'user_id' => $user->id,
                        'code' => $code
                    ];

                    dispatch(new SendEmailJob($mail_data));
                    return response()->json(
                        [
                            'status' => 200,
                            'message' => trans('app.Code_sent_on_your_email'),
                            'result' => $code
                        ]
                    );
                }
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('passwords.user'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Reset password based on following parameter
     * URL: http://localhost/zego/public/api/reset_password
     *
     * @param  mixed $request
     * @return void
     */
    public function resetPassword(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'code' => 'required|size:6',
                    'password' => 'required|min:8|max:15',
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(['status' => 0, 'message' => $message, 'result' => null]);
            }

            $user = User::where('reset_code', $request->code)->first();
            if ($user) {
                $user->password = Hash::make(str_replace(' ', '', $request->password));
                $user->save();

                return response()->json(
                    [
                        'status' => 200,
                        'message' => trans('auth.Reset_password_successfully'),
                        'result' => null
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('auth.please_enter_correct_code'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Change password based on following parameter
     * URL: http://localhost/zego/public/api/change_password
     *
     * @param  mixed $request
     * @return void
     */
    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'password' => 'required|min:8|max:15',
            ]);

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user_id = $request->user()->id;
            $user = User::select("id", "password")->where('id', $user_id)->first();
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make(str_replace(' ', '', $request->password));
                $user->save();

                return response()->json(
                    [
                        'status' => 200,
                        'message' => trans('auth.password_changed_success'),
                        'result' => null
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('auth.please_enter_correct_current_password'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Refresh token based on following parameter
     * URL: http://localhost/zego/public/api/refresh_token
     *
     * @param  mixed $request
     * @return void
     */
    public function refreshToken(Request $request)
    {
        $token = JWTAuth::refresh($request->token);
        return response()->json(
            [
                'status' => 200,
                'message' => 'Token Refresh',
                'result' => [
                    'token' => $token
                ]
            ]
        );
    }

    /**
     * Update profile based on following parameter
     * URL: http://localhost/zego/public/api/profile
     *
     * @param  mixed $request
     * @return void
     */
    public function getProfile(Request $request)
    {
        try {
            $user_id = $request->user()->id;
            $user = Helper::getUsers(
                [
                    'id' => $user_id
                ]
            );

            if ($user) {
                // unset($user['password']);
                // $user->is_email_verified = $user->email_verified_at != null ? 1 : 0;
                $user->is_profile_complete = $user->name != null ? 1 : 0;
                return response()->json(
                    [
                        'status' => 200,
                        'message' => trans('app.Profile_Details_Is_Found'),
                        'result' => $user
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('app.Profile_Details_Is_Not_Found'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Update profile based on following parameter
     * URL : http://localhost/zego/public/api/update-profile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(Request $request)
    {
        try {
            $user_id = $request->user()->id;
            DB::beginTransaction();
            $request->merge(['phone_number' => preg_replace('/^0?/', "", $request->phone_number)]);
            $validator = Validator::make(
                $request->all(),
                [
                    'country_id' => 'required|integer',
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                ],
                [
                    'country_id.required' => trans('app.Please_select_a_county'),
                    'name.required' => trans('app.Please_enter_full_name'),
                    'email.required' => trans('app.Please_enter_a_email_address'),
                    'email.email' => trans('app.Please_enter_a_valid_email_address'),
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user = User::select("*")->where(
                [
                    "id" => $user_id
                ]
            )->first();

            $is_update_email = false;
            if ($request->email != $user->email) {
                $is_update_email = true;
            }

            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();

            if ($user) {
                DB::commit();
                $message = trans('app.Profile_details_has_been_saved_successfully');

                $user = Helper::getUsers(['id' => $user_id]);
                $user->is_profile_complete = $user->name != null ? 1 : 0;
                // $user->is_email_verified = $user->email_verified_at != null ? 1 : 0;

                return response()->json(
                    [
                        'status' => 200,
                        'message' => $message,
                        'result' => $user
                    ]
                );
            } else {
                DB::rollback();
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('app.Error_Occurred_During_Save_Please_Try_Again'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Check email is verified based on following parameter
     * URL: http://localhost/zego/public/api/check-email-verified
     *
     * @param  mixed $request
     * @return void
     */
    public function checkEmailVerified(Request $request)
    {
        try {
            $user_id = $request->user()->id;
            $user = Helper::getUsers(
                [
                    'id' => $user_id
                ]
            );

            if (!empty($user) && $user->email_verified_at != null) {
                $user->is_email_verified = $user->email_verified_at != null ? 1 : 0;
                $user->is_profile_complete = $user->name != null ? 1 : 0;

                return response()->json(
                    [
                        'status' => 200,
                        'message' => trans('app.Welcome_user', ['name' => $user->name]),
                        'result' => $user
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('auth.account_not_verified'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Check email is verified based on following parameter
     * URL : http://localhost/zego/public/api/resend-code
     *
     * @param  mixed $request
     * @return void
     */
    public function resendCode(Request $request)
    {
        try {
            $user_id = $request->user()->id;

            $user = Helper::getUsers(['id' => $user_id]);

            if (!empty($user)) {
                $code = mt_rand(111111, 999999);

                $user->reset_code = $code;
                $user->save();

                $mail_data = [
                    'email_id' => 2,
                    'user_id' => $user->id,
                    'code' => $code
                ];

                dispatch(new SendEmailJob($mail_data));
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('app.Code_resend_successfully'),
                        'result' => null
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('auth.something_went_wrong'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Feedback
     *
     * @param  mixed $request
     * @return void
     */
    public function feedback(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    'subject' => "required",
                    'message' => "required",
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user = $request->user();
            $email = Contact::create(
                [
                    'user_id' => $user->id,
                    'subject' => $user->subject,
                    'message' => $request->message
                ]
            );

            if ($email) {
                DB::commit();
                return response()->json(
                    [
                        'status' => 200,
                        'message' => trans('app.Enquiry_has_been_added'),
                        'result' => null
                    ]
                );
            } else {
                DB::rollback();
                return response()->json(
                    [
                        'status' => 0,
                        'message' => trans('app.Error_Occurred_During_Save_Please_Try_Again'),
                        'result' => null
                    ]
                );
            }
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Terms and Conditions Page
     *
     * @param  mixed $request
     * @return void
     */
    public function termsConditions()
    {
        return response()->json(
            [
                'status' => 200,
                'message' => "",
                'result' => route('app.terms-conditions', ['mobile' => true])
            ]
        );
    }

    /**
     * Privacy Policy Page
     *
     * @return void
     */
    public function privacyPolicy()
    {
        return response()->json(
            [
                'status' => 200,
                'message' => "",
                'result' => route('app.privacy-policy', ['mobile' => true])
            ]
        );
    }

    /**
     * About Us Page
     *
     * @return void
     */
    public function aboutUs()
    {
        return response()->json(
            [
                'status' => 200,
                'message' => "",
                'result' => route('app.about-us', ['mobile' => true])
            ]
        );
    }

    /**
     * Crash
     *
     * @return void
     */
    public function crash(Request $request)
    {
        try {
            // Crash::create(
            //     [
            //         'screen_name' => $request->screen_name,
            //         'error_code' => $request->error_code,
            //         'device_type' => $request->device_type,
            //         'message' => $request->message,
            //     ]
            // );
            return response()->json(
                [
                    'status' => 200,
                    'message' => "success",
                    'result' => ""
                ]
            );
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }

    /**
     * Notifications
     *
     * @param  mixed $request
     * @return void
     */
    public function notifications(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'page_no' => 'required|integer',
                    'per_page' => 'required|integer'
                ]
            );

            if ($validator->fails()) {
                $result = json_decode($validator->errors(), true);
                $message = '';
                foreach ($result as $value) {
                    $message = implode(', ', $value);
                    break;
                }
                return response()->json(
                    [
                        'status' => 0,
                        'message' => $message,
                        'result' => null
                    ]
                );
            }

            $user_id = $request->user()->id;
            $per_page = 20;
            $page_no = 1;

            if (isset($request->per_page) && !empty($request->per_page)) {
                $per_page = $request->per_page;
            }
            if (isset($request->page_no) && !empty($request->page_no)) {
                $page_no = $request->page_no;
            }
            $offset = ($page_no - 1) * $per_page;

            $notifications = Notification::orderBy('id', 'desc');
            $notifications->whereHas('receivers', function ($query) use ($user_id) {
                $query->where('receiver_id', $user_id);
            });

            if (!empty($per_page)) {
                $notifications->offset($offset);
                $notifications->limit($per_page);
            }
            $notifications = $notifications->get();

            return response()->json(
                [
                    'status' => 200,
                    'message' => "Notification list",
                    'result' => $notifications
                ]
            );
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 0,
                    'message' => trans('app.something_went_wrong'),
                    'result' => null
                ]
            );
        }
    }
}
