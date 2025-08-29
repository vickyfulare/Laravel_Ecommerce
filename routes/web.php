<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('/login','login');
Route::get('/login', function () {
    return view('login');
})->middleware('userauth');
Route::post('/login-page',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('/logout', [UserController::class, 'logout']);

Route::view('add-product','add-product');
Route::post('addproduct',[ProductController::class,'addProduct']);
Route::get('all-products',[ProductController::class,'allProducts']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::get('search', [ProductController::class, 'search']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('/cartlist', [ProductController::class, 'cartList']);
Route::delete('/removecart/{id}', [ProductController::class, 'removeCart']);
Route::get('/ordernow', [ProductController::class, 'orderNow']);
Route::post('/orderplace', [ProductController::class, 'orderPlace']);
Route::get('/myorders', [ProductController::class, 'myOrders']);
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'register']);
Route::view('forgot','forgotpass');

// Handle forgot password request
Route::post('/forgot', [UserController::class, 'forgotPassword']);