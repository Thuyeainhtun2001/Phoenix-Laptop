<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PhoenixController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// for phoenix home
Route::get('/',[PhoenixController::class,'home'])->name('phoenix.home');
// for shop
Route::get('/shop/{id}',[PhoenixController::class,'shop'])->name('shop');
// for contact
Route::post('/contact',[ContactController::class,'contact'])->name('contact');
// middleware for back prevent
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // for prevent back history middleware
    Route::middleware(['prevent-back-history'])->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        //    for profile edit
        Route::post('/profile/edit/', [UserController::class, 'edit'])->name('profile.edit');
        // for password change
        Route::post('/profile/password/', [UserController::class, 'password'])->name('profile.password');
    });
});
// for admin dashbord
Route::middleware(['admin'])->group(function(){
    Route::get('/admin/content/',[AdminController::class,'content'])->name('admin.content');
    // for category
    Route::prefix('admin/category/')->group(function(){
        Route::get('/create/',[CategoryController::class,'create'])->name('category.create');
        // for create data
        Route::post('/createCategory/',[CategoryController::class,'createCategory'])->name('category.createCategory');
        // for category lists
        Route::get('/list/',[CategoryController::class,'list'])->name('category.list');
        // for edith btn
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        // for update btn
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
        // for delete btn
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
    // for product
    Route::prefix('/admin/product/')->group(function(){
        // create product
        Route::get('/createProduct',[ProductController::class,'createProduct'])->name('admin.createProduct');
        // input product data
        Route::post('/inputProduct/',[ProductController::class,'inputProduct'])->name('admin.inputProduct');
        // product list
        Route::get('/productList',[ProductController::class,'productList'])->name('admin.productList');
        // product detail
        Route::get('/productDetail/{id}',[ProductController::class,'productDetail'])->name('admin.productDetail');
        // product edite
        Route::get('/productEdit/{id}',[ProductController::class,'productEdit'])->name('admin.productEdit');
        // update product data
        Route::post('/updateProduct/{id}',[ProductController::class,'updateProduct'])->name('admin.updateProdut');
        // product delete
        Route::get('/productDelete/{id}',[ProductController::class,'productDelete'])->name('admin.productDelete');
    });
    // for orderList
    Route::prefix('/admin/order/')->group(function(){
        // orderList
        Route::get('/orderList',[OrderController::class,'orderList'])->name('orderList');
        // deliver
        Route::get('/deliver/{orderNumbr}',[OrderController::class,'deliver'])->name('deliver');
        // for delete
        Route::get('/delete/{orderNumber}',[OrderController::class,'delete'])->name('delete');
        // for orderlist detail
        Route::get('/detail/{orderNumber}',[OrderDetailController::class,'detail'])->name('order.detail');
    });
    // for accounts list
    Route::prefix('/admin/account/')->group(function(){
        // for user lists
        Route::get('/userList',[AdminController::class,'userList'])->name('admin.userList');
        // for user detail
        Route::get('/userDetail/{id}',[AdminController::class,'userDetail'])->name('user.detail');
        // promote to admin
        Route::get('/promoteToAdmin/{id}',[AdminController::class,'promoteToAdmin'])->name('promoteToAdmin');
        // for delete btn
        Route::get('/userDelete/{id}',[AdminController::class,'userDelete'])->name('user.delete');
        // for admin lists
        Route::get('/adminList',[AdminController::class,'adminList'])->name('admin.adminList');
        // for admin detail
        Route::get('/adminDetail/{id}',[AdminController::class,'adminDetail'])->name('admin.detail');
        // change to user
        Route::get('/changeToUser/{id}',[AdminController::class,'changeToUser'])->name('changeToUser');
        // for delete
        Route::get('/delete/{id}',[AdminController::class,'adminDelete'])->name('admin.delete');
    });
    // for contact
    Route::prefix('admin/contact')->group(function(){
        Route::get('/contactList',[ContactController::class,'contactList'])->name('contactList');
        Route::get('/contactListDetail/{id}',[ContactController::class,'contactListDetail'])->name('contactListDetail');
        Route::get('/contactListDelete/{id}',[ContactController::class,'contactListDelete'])->name('contactListDelete');
    });
});
// for user
Route::middleware(['user'])->group(function(){
    Route::post('/cart/add/',[CartController::class,'cartAdd'])->name('cart.add');
    Route::get('/cartList',[CartController::class,'cartList'])->name('cart.list');
    Route::post('/deleteCart',[CartController::class,'deleteCart'])->name('delete.cart');
    Route::get('/cancel',[CartController::class,'cancel'])->name('cancel');
    Route::post('/orderBtn',[OrderController::class,'orderBtn'])->name('orderBtn');
});
