<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');


Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login', [MainController::class, 'login'])->name('login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('register');    

    Route::get('/admin/dashboard', [MainController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/settings', [MainController::class, 'settings'])->name('admin.settings');
    Route::get('/admin/profile', [MainController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/staff', [MainController::class, 'staff'])->name('admin.staff');

});