<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use crypt;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.custom.auth_login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->validate([
            'email'         =>  'required',
            'password'      =>  'required'
        ]);

        $user = User::where('email', $request->email)->where('decrypted_password', $request->password)->first();

if(!empty($user)){
    if ($user->approved == 1) {
        if($user->status == 1){
            Auth::login($user);
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
        return back()->with('active', 'Your account is deactivated please contact to admin');
        }
    }else {
        return back()->with('active', 'Your account has not approved yet please contact to admin for your approval');
    }
}else{
    return back()->with('active', 'These credentials do not match our records');
}
        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
