<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\LoggedIn;
use App\Models\User;
// use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class AdminLoginController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/admin';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function login(Request $request)
	{

		$this->validateLogin($request);
		$user_email =  User::where('email', $request->email)->first();
		$ip = $request->ip();

		if (!empty($user_email)) {
			LoggedIn::create(['user_id' => $user_email->parent_id,'employee_id' => $user_email->id, 'ipaddress' => $ip]);
		}

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if (
			method_exists($this, 'hasTooManyLoginAttempts') &&
			$this->hasTooManyLoginAttempts($request)
		) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if ($this->attemptLogin($request)) {
			if ($request->hasSession()) {
				$request->session()->put('auth.password_confirmed_at', time());
			}

			$role = Role::find(Auth::user()->role_id);

			if(strpos($role->name, 'Builder') !== false){
				return redirect()->route('builder.home');
			}

			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}


	public function __construct()
	{
		if (isset(Auth::user()->id) && Auth::user()->role_id == 2) {
			return redirect()->route('logout');
		}
		$this->middleware('guest')->except('logout');
	}

	/**
	 * ShowLoginForm
	 *
	 * @return void
	 */
	public function showLoginForm()
	{
		return view('admin.auth.login');
	}

	/**
	 * SendFailedLoginResponse
	 *
	 * @param  mixed $request
	 * @return void
	 */
	public function sendFailedLoginResponse(Request $request)
	{
		return redirect()->back()
			->withInput()
			->with('warning', trans('auth.failed'));
	}

	/**
	 * Authenticated
	 *
	 * @param  mixed $user
	 * @return void
	 */
	protected function authenticated(Request $request, $user)
	{
		if ($user->role_id == 3) {
			return redirect()->route('superadmin');
		}
		if (!empty($user->parent_id)) {
			Session::put('parent_id', $user->parent_id);
		} else {
			Session::put('parent_id', $user->id);
		}
		LoggedIn::withoutGlobalScopes()->where('employee_id',$user->id)->OrderBy('id','DESC')->first()->update(['succeed' => 1]);

		Session::put('plan_id', User::where('id', Session::get('parent_id'))->first()->plan_id);
		if ($user->role_id != 1 || $user->status == 0) {
			Auth::logout();
			return redirect()->back()->with('warning', trans('auth.sufficient_permissions'));
		}
	}

	/**
	 * Logout
	 *
	 * @param  mixed $request
	 * @return void
	 */
	public function logout(Request $request)
	{
		if (isset(Auth::user()->role_id) && Auth::user()->role_id == 1) {
			$this->redirectTo = "/admin/login";
		}
		$this->guard()->logout();
		$request->session()->invalidate();
		return $this->loggedOut($request) ?: redirect($this->redirectTo);
	}
}
