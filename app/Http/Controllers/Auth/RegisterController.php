<?php

namespace App\Http\Controllers\Auth;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use App\Notifications\VerifyRegistration;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        }else{
            $this->redirectTo = route('customer.dashboard');
        }
        $this->middleware('guest');
    }

    /**
     * Overwrite Registration form registration request.
     *
     * Display Division and District
     */

    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('auth.register',compact('districts','divisions'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:40'],
            'last_name' => ['nullable', 'string', 'max:40'],
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'string', 'max:16', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'division' => ['required', 'numeric'],
            'district' => ['required', 'numeric'],
            'street_address' => ['required', 'max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            'role_id' => 2,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'street_address' => $request->street_address,
            'division' => $request->division,
            'district' => $request->district,
            'ip_address' => request()->ip(),
            'remember_token' => Str::random(50),
            'about' => $request->about,
            'status' => 0,
        ]);

        $user->notify(new VerifyRegistration($user));

        session()->flash('success', 'A confirmation email has send to you... Please check and confirm your email');
        return redirect()->back();
    }
}
