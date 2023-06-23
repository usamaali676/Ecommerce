<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::Customer;

    protected function authenticated(Request $request, $user)
    {
        // Get the user's role ID
        $userRoleId = $user->role_id;

        // Check the user's role ID and redirect accordingly
        switch ($userRoleId) {
            case 1: // Admin
                return redirect()->route('home');
                break;
            case 2: // Editor
                return redirect()->route('home');
                break;
            case 3: // Customer
                return redirect()->route('customerdashboard');
                break;
        }
    }





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


        $this->middleware('guest')->except('logout');
    }


}
