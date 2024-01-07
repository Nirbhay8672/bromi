<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\LoggedIn;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use App\Models\Subplans;
use Carbon\Carbon;


class AdminLoginController extends Controller
{
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

			if(Auth::user()->plan_id == null) {
			    Session::put('user_id', Auth::user()->id);
			    $this->guard()->logout();
			    return redirect()->route('subscription');
			}

			$role = Role::find(Auth::user()->role_id);

			if(strpos($role->name, 'Builder') !== false){
				return redirect()->route('builder.home');
			}

			return $this->sendLoginResponse($request);
		}

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
	
		public function subscription()
	{
		return view('guest.plan')->with([
			'plans' =>  Subplans::all(),
		]);
	}

	public function savePlan(Request $request)
	{
		$user = User::find($request->user_id);
		Auth::login($user);

		$plan_details = Subplans::find($request->plan_id);
		$user->fill([
			'plan_id' => $request->plan_id,
			'subscribed_on' => Carbon::now()->format('Y-m-d'),
			'total_user_limit' => $plan_details->user_limit,
		])->save();

		Session::put('plan_id', $request->plan_id);
		$role = Role::find($user->role_id);

		if(strpos($role->name, 'Builder') !== false){
			return redirect()->route('builder.home');
		}

		return redirect('/admin');
	}
}
