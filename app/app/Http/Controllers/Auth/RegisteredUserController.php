<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Notifications\UserRegistration;


class RegisteredUserController extends Controller
{
    protected $admin;

    public function __construct()
    {
        $this->admin = User::where('id', 1)->first();
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.custom.auth_register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required',
            'password'      =>  'required|min:6|same:confirm_password',
        ]);

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return back()->with('error','Email is invalid');
        }
        $exist  =   User::where('email', $request->email)->first();

        if ($exist) {
            return back()->with('already', 'This email already exist in our systme please register new one');
        }


        $user = User::create([
            'name'                  =>      $request->name,
            'email'                 =>      $request->email,
            'password'              =>      Hash::make($request->password),
            'decrypted_password'    =>      $request->password,
            'phone'                 =>      $request->phone,
            'country'               =>      $request->country,
            'state'                 =>      $request->state,
            'city'                  =>      $request->city,
            'address'               =>      $request->address,
            'postal_code'           =>      $request->postal_code,
            'gender'                =>      $request->gender,
            'avatar1'               =>      uploadFile($request->avatar1, 'users_imgs'),
            'approved'              =>      0,
            'dob'                   =>      $request->dob,
            'userType'              =>      'customer/user'
        ]);

        event(new Registered($user));

        $data = [
            'message'   =>   'New user has registered & is pending for approval'
        ];
        
        $this->admin->notify(new UserRegistration($data));

        return redirect('/login')->with('success', "Registered successfully now wait for admin's approval");
    }
}
