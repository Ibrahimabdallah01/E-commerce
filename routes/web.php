<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin/login', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);

route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/admin/list', [AdminController::class,'list']);

    Route::get('admin/admin/add', [AdminController::class,'add']);

    Route::post('admin/admin/add', [AdminController::class,'insert']);

    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);

    Route::post('admin/admin/edit/{id}', [AdminController::class,'update']);

    Route::get('admin/admin/delete/{id}', [AdminController::class,'delete']);
});

// route::get('admin/dashboard', [AdminMiddleware::class,'index'])->middleware(['auth', 'admin']);

Route::get('/', function () {
    return view('welcome');
});
