<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HRDController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductBenefitController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentListController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\Website\HomesController;
use App\Http\Controllers\Website\SignUpController;


//website

Route::get('/', [HomesController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomesController::class, 'tentang'])->name('tentang');
Route::get('/produk-kami', [HomesController::class, 'productKami'])->name('product_kami');
Route::get('/cara-klaim', [HomesController::class, 'caraKlaim'])->name('cara_klaim');
Route::get('/faq', [HomesController::class, 'Faq'])->name('faq');


Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::post('/register', [SignUpController::class, 'register'])->name('register');
Route::get('/register-success', [SignUpController::class, 'successRegister'])->name('success_register');


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
        Route::get('/hrd/updateStatus/{id}/{status}', [HRDController::class, 'updateStatus'])->name('admin.hrd.updateStatus');
        Route::get('/hrd/edit/{id}', [HRDController::class, 'edit'])->name('admin.hrd.edit');
        Route::get('/hrd/delete/{id}', [HRDController::class, 'delete'])->name('admin.hrd.delete');

        //Employee
        Route::get('/employee', [EmployeeController::class, 'index'])->name('admin.employee');
        Route::get('/employee/form', [EmployeeController::class, 'add'])->name('admin.employee.add');
        Route::post('/employee/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
        Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
        Route::get('/employee/updateStatus/{id}/{status}', [EmployeeController::class, 'updateStatus'])->name('admin.employee.updateStatus');
        Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('admin.employee.delete');

        //Product
        Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/product/form', [ProductController::class, 'add'])->name('admin.product.add');
        Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');

        //product_benefit
        Route::get('/product/benefit/{id_product}', [ProductBenefitController::class, 'index'])->name('admin.product_benefit');
        Route::get('/product/benefit/form/{id_product}', [ProductBenefitController::class, 'add'])->name('admin.product_benefit.add');
        Route::get('/product/benefit/delete/{products_id}/{id}', [ProductBenefitController::class, 'delete'])->name('admin.product_benefit.delete');
        Route::post('/product/benefit/store', [ProductBenefitController::class, 'store'])->name('admin.product_benefit.store');
        Route::get('/product/benefit/edit/{id}', [ProductBenefitController::class, 'edit'])->name('admin.product_benefit.edit');
        Route::put('/product/benefit/update/{id}', [ProductBenefitController::class, 'update'])->name('admin.product_benefit.update');


        //payment
        Route::get('/payment_page', [PaymentController::class, 'index'])->name('admin.payment');
        Route::POST('/payment_page/store', [PaymentController::class, 'store'])->name('admin.payment.store');

        //paymentAdmin
        Route::get('/payment_list', [PaymentListController::class, 'index'])->name('admin.paymentlist');
        Route::get('/payment_list/edit/{id}/{status}/{bulan}', [PaymentListController::class, 'update'])->name('admin.paymentlist.update');


        
        //claim
        Route::get('/form-claim', [ClaimController::class, 'index'])->name('admin.form-claim');
        Route::post('/form-claim/store', [ClaimController::class, 'store'])->name('admin.form-claim.store');
    });
});