<?php

use App\Http\Controllers\AdminAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\AuthSupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductsController::class,'index'])->name('home');



// Guest Authentication

Route::group([
    'middleware' => 'guest',
    'prefix' => 'auth',
    'as' => 'auth.'
],(function () {
    Route::get('/login',[AuthController::class,'index'])->name('loginPage');
    
    Route::post('',[AuthController::class,'login'])->name('login');
    
    Route::get('/register',[AuthController::class,'create'])->name('register');
    
    Route::post('/register',[AuthController::class,'store'])->name('store');    
}));
Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout');

/////////////////////


// Admin Actions


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
],function () {
    
    // Admin Actions With Login

    Route::group([
        'middleware' => 'auth:admin'
    ],function () {

        Route::get('dashboard',[AdminPanelController::class,'dashboard'])->name('dashboard');
        Route::get('inbox',[AdminPanelController::class,'inbox'])->name('inbox');
        Route::get('message/{id}',[AdminPanelController::class,'message'])->name('message');
        Route::get('search',[AdminPanelController::class,'search'])->name('search');
        Route::get('suppliers',[AdminPanelController::class,'suppliers'])->name('suppliers');
        Route::get('products',[AdminPanelController::class,'products'])->name('products');
        Route::get('users',[AdminPanelController::class,'users'])->name('users');
        Route::get('change-password',[AdminAuthController::class,'changeView'])->name('changeView');
        Route::post('logout',[AdminAuthController::class,'logout'])->name('logout');
        Route::post('change-password',[AdminAuthController::class,'changePassword'])->name('change');

    });


    // Admin Authentications


    Route::get('login',[AdminAuthController::class,'loginPage'])->name('loginPage');
    Route::post('login',[AdminAuthController::class,'login'])->name('login');
    Route::get('register',[AdminAuthController::class,'create'])->name('create');
    Route::post('register',[AdminAuthController::class,'store'])->name('store');

});

/////////////////////



// Supplier Authentication

Route::group([
    'prefix' => 'supplier',
    'as' => 'supplier.'
],(function () {
    Route::get('/login',[AuthSupplierController::class,'loginPage'])->name('loginPage')->middleware('guest:supplier');

    Route::post('/login',[AuthSupplierController::class,'login'])->name('login')->middleware('guest:supplier');
    
    Route::get('/register',[AuthSupplierController::class,'create'])->name('register')->middleware('guest:supplier');
    
    Route::post('/register',[AuthSupplierController::class,'store'])->name('store')->middleware('guest:supplier');    
}));
Route::post('supplier/logout',[AuthSupplierController::class,'logout'])->name('supplier.logout')->middleware('auth:supplier');

/////////////////////



// Suppliers Actions

Route::group([
    'middleware' => 'auth:supplier',
    'prefix' => 'supplier',
    'as' => 'supplier.'
],function () {
    Route::get('',[SupplierController::class,'index'])->name('index');
    Route::get('change-password',[AuthSupplierController::class,'changeView'])->name('changeView');
    Route::post('change-password',[AuthSupplierController::class,'changePassword'])->name('change');
    Route::get('products',[ProductsController::class,'indexAsSupplier'])->name('products');
    Route::get('myproducts',[SupplierController::class,'myproducts'])->name('myproducts');
    Route::get('profile',[SupplierController::class,'profile'])->name('profile');

    // Products Action for Supplier only

    Route::group([
        'prefix' => 'product',
        'as' => 'product.'
    ],function () {
        Route::get('create',[ProductsController::class,'create'])->name('create');
        Route::get('show/{id}',[ProductsController::class,'showAsSupplier'])->name('show');
        Route::get('{id}/edit',[ProductsController::class,'edit'])->name('edit');
        Route::put('{id}/update',[ProductsController::class,'update'])->name('update');
        Route::post('create',[ProductsController::class,'store'])->name('store');
        Route::delete('{id}/delete',[ProductsController::class,'destroy'])->name('destroy');
    });
});

/////////////////////



// Methods in home

Route::get('products',[ProductsController::class,'index'])->name('index')->middleware('auth:supplier');
Route::get('contact',[ProductsController::class,'contact'])->name('contact');
Route::get('products/search/{tag}',[ProductsController::class,'search'])->name('products.serach');
Route::get('product/{id}/show',[ProductsController::class,'show'])->name('product.show');

// Home Methods Woth Loged in

Route::group([
    'middleware' => 'auth'
],function () {

    Route::get('settings',[AuthController::class,'settings'])->name('settings');
    Route::post('change-password',[AuthController::class,'changePassword'])->name('changePassword');
    Route::get('report/{id}',[ProductsController::class,'reportView'])->name('reportView');
    Route::post('report',[ProductsController::class,'report'])->name('report');
    Route::get('cart',[CartController::class,'cart'])->name('cart');
    Route::get('cart/payment',[CartController::class,'paymentView'])->name('paymentView');
    Route::post('order',[CartController::class,'order'])->name('order');
    Route::post('product/{id}/addtocart',[CartController::class,'addToCart'])->name('addtocart');
    Route::delete('product/{id}/deletefromcart',[CartController::class,'deleteFromCart'])->name('deletefromcart');
});


/////////////////////