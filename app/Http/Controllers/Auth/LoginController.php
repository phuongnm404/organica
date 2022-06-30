<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return redirect()->route('home.index');
    }

    public function postLogin(Request $request)
    {
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            if (auth()->user()->role == 1){
                return redirect()->back();
            }
            elseif (auth()->user()->role == 0) {
                return redirect('admin/home');
            }
        }
        return redirect('/home');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home.index');;
    }

}
