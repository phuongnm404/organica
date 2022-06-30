<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    


    public function index() {
        return view('admin.home');
    }
    public function login() {
       
        return view('admin.loginAdmin');
    }
    
    public function postLoginAdmin(Request $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->route('admin.home');
        }
        else {
            dd('login khong thanh cong');
        }

    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }


}
