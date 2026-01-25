<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller

{
    public function index()
    {
        $title = "Product List";
        return view("product.index", ['title' => $title,
            'products'=>[
                ['id'=>1, 'name'=>'Laptop', 'price'=>1000],
                ['id'=>2, 'name'=>'Smartphone', 'price'=>500],
                ['id'=>3, 'name'=>'Tablet', 'price'=>300],
            ]
        ]);
    }
    public function getDetail(string $id = '123')
    {
        return view('product.detail', ['id' => $id]);
    }
    public function create(){
        return view('product.add');
    }
    public function store(Request $request){
        // Xử lý lưu sản phẩm mới

    }

    public function login(){
        return view('login');
    }
    public function checkLogin(Request $request){
        if ($request->input('username') == 'thuy' && $request->input('password') == '12345') {
        
            return redirect('/');
        } else {
            return "Đăng nhập thất bại.";
        }
    }
    
    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        if (
            $request->username == 'thuy' &&
            $request->password == '12345'
        ) {
            return redirect()->route('home');
        }

        return back()->with('error', 'Đăng ký thất bại');
    }
}

