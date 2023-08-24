<?php

namespace App\Http\Controllers\Administrator\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\LarapatternAuth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
        // $this->middleware([LarapatternAuth::class])->except('logout');
    }

    /**
     * Show admin login form
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        return view('admin.auth.login');
    }

    /**
     * Log the user out of the application
     *
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $this->guard(config('larapattern.auth.guard', 'web'))->logout();

        $request->session()->invalidate();

        return redirect()->route('administrator.login');
    }

    /**
     * Get guard to be used during authentication
     *
     * @return \Illuminate\contstructs\StatefulGuard
     */
    public function guard() {
        return Auth::guard(config('larapattern.auth.guard', 'web'));
    }
}
