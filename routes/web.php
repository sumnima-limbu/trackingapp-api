<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\MapController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\CircleController;
use App\Http\Controllers\admin\UserController;

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

Route::get('/', function() {
    return view('auth.login');
});

Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::post('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');


Route::group(['middleware'=> ['web', 'AuthCheck']], function(){
    Route::get('/auth/login', [MainController::class, 'login'])->name('login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('register');  

    Route::get('/admin/profile', [MainController::class, 'index'])->name('admin.profile');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/maps', [MapController::class, 'index'])->name('admin.maps');
    Route::get('/admin/circle', [CircleController::class, 'index'])->name('admin.circle');
    Route::get('/admin/notification', [NotificationController::class, 'index'])->name('admin.notification');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.store');
    Route::get('/admin/users/index', [UserController::class, 'index'])->name('admin.user');
    Route::post('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.delete');

    // Route::get('/admin/settings', [MainController::class, 'settings'])->name('admin.settings');
    // Route::get('/admin/staff', [MainController::class, 'staff'])->name('admin.staff');

});