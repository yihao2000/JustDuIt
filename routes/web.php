<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// All User Access
//Redirect to home
Route::get('/', function () {
    return redirect('home');
});

// Product Detail
Route::get('productdetail/{id}', [ProductController::class, 'showProductDetail']);

 //User Logout
 Route::get('logout', [UserController::class, 'logout']);

//Go to home
Route::get('home', [ProductController::class, 'showHomePage']);

//Search Product
Route::get('filterproduct', [ProductController::class, 'filterProduct']);


//Only guest can access
Route::group(['middleware' => 'auth'], function(){

    //User Login
   Route::post('login', [UserController::class, 'login']);

   //Go login page
   Route::get('login', [UserController::class, 'showLoginPage']);

   //Go Register Page
   Route::get('register', [UserController::class, 'showRegisterPage']);

   // User Register
   Route::post('register', [UserController::class, 'register']);
   
});

//Only logged in user can access
Route::group(['middleware' => 'user'], function(){
    Route::get('addtocartpage/{id}', [ProductController::class, 'showAddProductToCartPage']);
    Route::post('addtocart', [CartController::class, 'addToCart']);
    Route::get('cart', [CartController::class, 'showCartPage']);
    Route::get('editcart/{id}', [CartController::class, 'showEditCartPage']);
    Route::post('editcart', [CartController::class, 'editCart']);
    Route::get('deletecart/{id}', [CartController::class, 'deleteCart']);
    Route::get('viewtransaction', [TransactionController::class, 'viewTransactionPage']);
    Route::get('checkout', [TransactionController::class, 'checkout']);

});






//Admin Middleware
Route::group(['middleware' => 'admin'], function(){
    Route::get('addproduct', [ProductController::class, 'showAddProductPage']);
    Route::post('addproduct', [ProductController::class, 'addProduct']);
    Route::get('editproductpage/{id}', [ProductController::class, 'showEditProductPage']);
    Route::post('editproductdetail', [ProductController::class, 'editProductDetail']);
    Route::get('alltransaction', [TransactionController::class, 'showAllTransaction']);
    // Route::post('editproduct', [ProductController::class, 'editProduct']);
    // Route::get('deleteproduct/{id}', [ProductController::class, 'deleteProduct']);


});


   
