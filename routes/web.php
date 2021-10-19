<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\listingController;

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

Route::get('/',[FrontendController::class,'company'])->name('company');
Route::get('/employees',[FrontendController::class,'employee'])->name('employee');
Route::get('/related/{id}',[FrontendController::class,'related'])->name('related');
Route::get('/company_search',[FrontendController::class,'company_search']);
Route::get('/employee_search',[FrontendController::class,'employee_search']);
Route::prefix('/admin')->namespace('admin')->group(function () {
    Route::match(['get', 'post'],'/',[AdminController::class, 'login'] );
    Route::match(['get', 'post'],'/register',[AdminController::class, 'register']);

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('logout',[AdminController::class, 'logout']);
        Route::get('employee',[EmployeeController::class, 'index'])->name('employee');
        Route::match(['get', 'post'],'/add-employee',[EmployeeController::class, 'add_employee']);
        Route::match(['get', 'post'],'/edit-employee/{id}',[EmployeeController::class, 'edit_employee']);
        Route::get('/delete-employee/{id}',[EmployeeController::class, 'delete']);
        Route::post('/update-employee-status',[EmployeeController::class, 'updateStatus']);
        Route::get('/employee-report/{id}',[EmployeeController::class, 'make_report']);
        Route::get('/company',[CompanyController::class, 'index']);
        Route::match(['get', 'post'],'/add-company',[CompanyController::class, 'add_company']);
        Route::match(['get', 'post'],'/edit-company/{id}',[CompanyController::class, 'edit_company']);
        Route::get('/delete-company/{id}',[CompanyController::class, 'delete']);
        Route::post('/update-company-status',[CompanyController::class, 'updateStatus']);
                
        Route::get('/search-company',[SearchController::class,'searchCompany']);
        Route::get('/search-employee',[SearchController::class,'searchEmployee']);
        Route::get('/export-report/{id}',[EmployeeController::class, 'export_report']);
        Route::get('/city-filter',[listingController::class,'cityFilter']);
    });
    
});
