<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HRDController;



Route::prefix('/admin')->group(function () {
    Route::get('/', [AuthenticationController::class, 'index'])->middleware('logged')->name('admin.login');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');
    Route::post('/login/auth', [AuthenticationController::class, 'login'])->name('adminauth');

    Route::middleware('logout')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        //admin
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin');
        Route::get('/admin/form', [AdminController::class, 'add'])->name('admin.admin.add');
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
        Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
        Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
        Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.admin.delete');

        //role
        Route::get('/role', [RoleController::class, 'index'])->name('admin.role');
        Route::get('/role/form', [RoleController::class, 'add'])->name('admin.role.add');
        Route::post('/role/store', [RoleController::class, 'store'])->name('admin.role.store');
        Route::put('/role/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');

        //HRD
        Route::get('/hrd', [HRDController::class, 'index'])->name('admin.hrd');
        Route::get('/hrd/form', [HRDController::class, 'add'])->name('admin.hrd.add');
        Route::post('/hrd/store', [HRDController::class, 'store'])->name('admin.hrd.store');
        Route::put('/hrd/update/{id}', [HRDController::class, 'update'])->name('admin.hrd.update');
        Route::get('/hrd/edit/{id}', [HRDController::class, 'edit'])->name('admin.hrd.edit');
        Route::get('/hrd/delete/{id}', [HRDController::class, 'delete'])->name('admin.hrd.delete');
    });
});