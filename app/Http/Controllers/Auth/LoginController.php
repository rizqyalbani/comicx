<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = 'maintenance';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
            'g-recaptcha-response'  => 'required|captcha',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended($this->redirectTo);
        } else {

            if(User::where('email', $request->email)->count() > 0) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'Password salah'
                ]);
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'email' => 'Email salah',
                    'password' => 'Password salah'
                ]);
            }

            
        }
    }
}
