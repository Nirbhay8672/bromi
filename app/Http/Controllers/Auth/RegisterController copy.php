<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\Otp;
use Illuminate\Http\UploadedFile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	public function showRegistrationForm()
    {
		$cities = City::orderBy('name')->get()->toArray();
		$states = State::orderBy('name')->get()->toArray();
		$roles = Role::all();
        return view('admin.auth.register',compact('cities','states','roles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'mobile_number' => $data['mobile_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => 1,
				'city_id' =>  $data['city_id'],
				'state_id' =>  $data['state_id'],
				'company_name' =>  $data['company_name'],
                'vendor_id' => Str::random(10),
                'is_active' => 1
            ]
        );
		try {
			if (!empty($data['branch_id'])) {
				$br = Branches::create(['name'=> $data['branch_id'] ,'city_id'=> $data['city_id'],'user_id'=> $user->id]);
				$user->branch_id = $br->id;
				$user->save();
			}
		} catch (\Throwable $th) {
			//throw $th;
		}

		$role =  new Role();
		$role->name = 'Admin_---_' . $user->id;
		$role->user_id =$user->id;
		$role->save();
		$role->syncPermissions(Permission::where('guard_name','web')->get()->pluck('id')->all());
		$user->syncRoles([]);
		$user->assignRole($role->name);
		Helper::setDroddownConfigurations($user->id);
        return $user;
    }

    /**
     * Registered
     *
     * @return void
     */
    public function registered(Request $request, $user)
    {
		// return redirect('/admin/login');
        $this->guard()->logout();
        return redirect('admin/login');
        //     ->with('success', 'We sent you an activation link. Check your email and click on the link to verify.');
    }

    
	public function storeFile(UploadedFile $file)
    {
        $path = "company_".time().(string) random_int(0,5).'.'.$file->getClientOriginalExtension();
        $file->storeAs("public/file_image/",$path);
        return $path;
    }
    
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required|unique:users,email',
            "mobile_number" => 'required',
            "company_name" => 'required',
            "role_id" => 'required',
            "address" => 'required',
            "state_id" => 'required',
            "city_id" => 'required',
            "password" => 'required',
            "password_confirmation" => 'required|same:password',
        ]);

        $all_user_count = count(User::all());

        $user = User::create(
            [   
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $all_user_count > 0 ? $request->role_id : 1,
				'city_id' =>  $request->city_id,
				'state_id' =>  $request->state_id,
				'company_name' =>  $request->company_name,
                'address' => $request->address,
                'company_logo' => $request->file ? $this->storeFile($request->file) : '',
                'vendor_id' => Str::random(10),
                'is_active' => 0,
            ]
        );

        $role_name = '';

        if($user->role_id != 1) {
            $role_name = 'Builder_---_' . $user->id;

            $role =  new Role();
            $role->name = $role_name;
            $role->user_id = 32;
            $role->save();

            $user->fill([
                'role_id' => $role->id,
            ])->save();

            $role->syncPermissions(Permission::where('guard_name','web')->get()->pluck('id')->all());
            $user->syncRoles([]);
            $user->assignRole($role->name);
            Helper::setDroddownConfigurations($user->id);
        }

        $state = State::find($request->state_id);
        $city = City::find($request->city_id);

        $new_state = new State();
        $new_state->fill([
            'name' => $state->name,
            'user_id' => $user->id,
        ])->save();

        $new_city = new City();
        $new_city->fill([
            'name' => $city->name,
            'user_id' => $user->id,
            'state_id' => $new_state->id,
        ])->save();
    
        $otp = new Otp();
        $otp->fill([
            'otp' => random_int(100000, 999999),
            'user_id' => $user->id,
        ])->save();
        
        config(['mail.driver' => 'smtp']);
        config(['mail.from_name' => 'Bromi']);
        config(['mail.host' => 'smtp.gmail.com']);
        config(['mail.port' => 587]);
        config(['mail.username' => 'hathaliyank@gmail.com']);
        config(['mail.password' => 'jzmk iqib mstp njln']);
        config(['mail.encryption' => 'tls']);
        
        $datas = [
            'name' => $user->first_name.' '.$user->last_name,
            'email' => $user->email,
            'otp' => $otp->otp,
            'template' => 'success',
            'message' => 'This is registration template.',
        ];

        Mail::send('success', $datas, function ($message) {
            $message->to($datas['email'])
                    ->subject('Welcome to our site');
        });
        
        Session::put('user_id', $user->id);

        if($user->exists) {
            return redirect('admin/otp-form');
        }
    }
}