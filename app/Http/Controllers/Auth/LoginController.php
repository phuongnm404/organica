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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
       
        // if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
        //     if (auth()::user()->role == 1){
        //         dd('nguoi dung');
        //     }
        //     elseif (auth()::user()->role == 0) {
        //        dd('admin');
        //     }
        // }
        // else {
        //     dd('login thất bại');
        // }
        // if (auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]))
        // {
        //     return redirect()->route('home.index');
        // } else {
        //     dd('login không thành công');
        // }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

}
