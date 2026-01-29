<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Comtroller\TestController;
use App\Http\Middleware\CheckAge;
use Illuminate\Http\Request;

// "/" : trả về view home
Route::get('/', function () {
    return view('home');
})->name('home');
//Đăng Nhập
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [ProductController::class, 'checkLogin']);



// GOM NHÓM "/product"
Route::prefix('product')
->middleware(CheckAge::class)
//->middleware([CheckTimeAccess::class])
->group(function () {
    Route::controller(ProductController::class)-> group(function(){
        Route ::get('/','index')->name('product.index'); 
        Route::get('/add','create')->name('product.add'); 
        Route::get('/detail/{id?}','getDetail');
        Route::post('/store','store'); 
        Route::get('/edit/{id}', 'edit');
    }); 
    
});

Route::resource('test',TestController::class);


// 1 ví dụ đặt tên route và gọi route qua tên
Route::get('/go-product', function () {
    // chuyển hướng bằng tên route
    return redirect()->route('product.index');
})->name('go.product');


Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
    return "Sinh viên: $name - MSSV: $mssv";
})->name('sinhvien.info');



Route::get('/banco/{n}', function ($n) {
    
    $n = (int) $n;
    if ($n < 1) $n = 1;
    if ($n > 20) $n = 20;

    return view('banco', ['n' => $n]);
})
->whereNumber('n')
->name('banco');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


//Đăng ký
Route::get('/register', [ProductController::class, 'register'])
    ->name('register');

Route::post('/register', [ProductController::class, 'checkRegister'])
    ->name('checkRegister');


//commit2
// form nhập tuổi
Route::get('/age', function () {
    return view('age');
})->name('age.form');

// lưu tuổi vào session
Route::post('/age', function (Request $request) {
    session(['age' => $request->age]);
    return redirect('/product');
})->name('age.submit');


Route::get('/clear', function () {
    session()->flush();
    return 'Session cleared';
});
