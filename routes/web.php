<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 

// "/" : trả về view home
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [ProductController::class, 'checkLogin']);



// GOM NHÓM "/product"
Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)-> group(function(){
        Route ::get('/','index')->name('product.index'); 
        Route::get('/add','create')->name('product.add'); 
        Route::get('/detail/{id?}','getDetail');
        Route::post('/store','store'); 
    }
    ); 
});


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


Route::get('/register', [ProductController::class, 'registerForm'])
    ->name('register.form');

Route::post('/register', [ProductController::class, 'register'])
    ->name('register');