<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    //


    public function index() {
        return view('admin.home');
    }

    public function loginAdmin()
    {
        
        return view('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.index');
        } else {
            dd('login không thành công');
        }
    }






}
