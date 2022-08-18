<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes

Route::get('admin/login',[App\Http\Controllers\Admin\AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login',[App\Http\Controllers\Admin\AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout',[App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
    Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('products',ProductController::class);
});
