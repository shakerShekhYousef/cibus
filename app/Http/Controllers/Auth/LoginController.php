<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    public function authenticated()
    {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.home');
        } elseif (auth()->user()->isRestaurant()) {
            return redirect()->route('admin.home');
        } elseif (auth()->user()->isUser()) {
            return redirect()->route('front.home');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
