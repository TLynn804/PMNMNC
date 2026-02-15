<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //show login form
    public function login(){
        return view('login');
    }
    // public function checkLogin(Request $request){
    //     if ($request->input('email') == 'lanhthuthuy5@gmail.com' && $request->input('password') == '12345') {
        
    //         return redirect('/');
    //     } else {
    //         return "Đăng nhập thất bại.";
    //     }
    // }

    //check login
    public function checkLogin(Request $request)
    {
        $account = $request->only('email', 'password');
        if(Auth::attempt($account)){
            //đăng nhập thành công
            return redirect('/admin');
        };
        return back()->with('error', 'Đăng nhập thất bại');

    }

    
}
