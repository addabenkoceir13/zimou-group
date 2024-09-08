<?php

use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\AttributesValueController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'submitLogin'])->name('login');

    Route::get('register', [UserRegisterController::class, 'showRegisterForm'])->name('user.showRegisterForm');
    Route::post('register', [UserRegisterController::class, 'register'])->name('user.register');
});

Route::middleware(['auth', 'role:admin'])->name('dashboard.')->prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/create', [UserController::class,'create'])->name('users.create');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('/attribute', AttributesController::class);
    Route::resource('/attributevalue', AttributesValueController::class);

});

Route::middleware(['auth'])->name('e-shopping.')->prefix('e-shopping')->group(function () {

    Route::resource('/product', ProductController::class);
    Route::get('/', [ProductController::class, 'index']);
});
Route::get('/attribute-values/{attributeId}', [ProductController::class, 'getAttributeValues']);


Route::get('logout', LogoutController::class)->middleware('auth')->name('auth.logout');
