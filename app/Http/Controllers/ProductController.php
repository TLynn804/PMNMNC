<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckTimeAccess;

class ProductController extends Controller

{
    // public static function middleware(): array{
    //     return[
    //         CheckTimeAccess::class,
        
    //     ];
    // }
    // public function index()
    // {
    //     $title = "Product List";
    //     return view("product.index", ['title' => $title,
    //         'products'=>[
    //             ['id'=>1, 'name'=>'Laptop', 'price'=>1000],
    //             ['id'=>2, 'name'=>'Smartphone', 'price'=>500],
    //             ['id'=>3, 'name'=>'Tablet', 'price'=>300],
    //         ]
    //     ]);
    // }
    // public function getDetail(string $id = '123')
    // {
    //     return view('product.detail', ['id' => $id]);
    // }
    // public function create(){
    //     return view('product.add');
    // }
    // public function store(Request $request){
    //     // Xử lý lưu sản phẩm mới

    // }

    
    
    public function register()
    {
        return view('register');
    }

    public function checkRegister(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $repass   = $request->repass;
        $mssv     = $request->mssv;
        $lop      = $request->lopmonhoc;
        $gioitinh = $request->gioitinh;
        if (
            $username === 'thuy' &&
            $password === '12345' &&
            $repass === '12345' &&
            $mssv === '0217767'  
        ) {
            return redirect()->route('home');
     }
        return back()->with('error', 'Đăng ký thất bại');
    }

// //index
//     public function index()
//     {
//         $products = \App\Models\Product::all();
//         return view('admin.product.index', ['products' => $products]);
//     }
//     public function create()
//     {
//         return view('admin.product.add');
//     }
//    public function store(Request $request){
//         $products = new Product;
//         $products->name = $request->input('name');
//         $products->price = $request->input('price');
//         $products->stock = $request->input('stock');
//         $products->save();
//         return redirect('/product');
//     }
//     public function edit(string $id){
//         $product = Product::find($id);
//         return view('admin.product.edit', ['product' => $product]);
//     }


//check age
    public function ageForm()
    {
        return view('age');
    }

    public function saveAge(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric'
        ]);

        session(['age' => $request->age]);

        return redirect('/product');
    }
//thực hành Quản lý sản phẩm
    public function index()
    {
        $products = Product::where('is_delete',0)->get();
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_delete',0)->get();
        return view('admin.product.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|min:0',
            'sale_price'=>'nullable|numeric|min:0',
            'stock'=>'required|integer|min:0'
        ]);

        Product::create($request->all());

        return redirect('/product')->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit',compact('product','categories'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);

        $product->update($request->all());

        return redirect('/product')->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->is_delete = 1;
        $product->save();

        return redirect('/product')->with('success','Đã xóa');
    }
}




