<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\CustomerController;
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

Route::post('/auth/save',[MainController::class,'store'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');
Route::post('/auth/update',[MainController::class,'update'])->name('auth.update');
Route::get('/auth/logout',[MainController::class,'logout'])->name('auth.logout');
Route::get('/',[MainController::class,'index'])->name('auth.login');       
Route::get('/auth/register',[MainController::class,'create'])->name('auth.register');
Route::get('/admin/customer',[MainController::class,'dashboard'])->name('dashboard');
Route::get('/admin/home',[MainController::class,'home'])->name('home');
Route::get('/admin/users',[MainController::class,'users'])->name('users');
Route::get('/userOnly',[MainController::class,'userOnly']);

// API
Route::get('/admin/customers',[MainController::class,'dashboards']);
Route::get('/admin/homes',[MainController::class,'homes']);
// Customers Tab API
Route::get('/admin/customer/puregolds',[CustomerController::class,'puregolds']);
Route::get('/admin/customer/mspgs',[CustomerController::class,'mspgs']); 
Route::get('/admin/customer/lccs',[CustomerController::class,'lccs']);
Route::get('/admin/customer/shoemarts',[CustomerController::class,'shoemarts']);       
Route::get('/admin/customer/smmas',[CustomerController::class,'smmas']);                
    
//import routes
Route::post('/admin/customer/importpuregold', [ImportExcelController::class, 'importPuregold'])->name('Customer.importPuregold');
Route::post('/admin/customer/importmspg', [ImportExcelController::class, 'importMSPG'])->name('Customer.importMSPG');
Route::post('/admin/customer/importlcc', [ImportExcelController::class, 'importLCC'])->name('Customer.importLCC');
Route::post('/admin/customer/importshoemart', [ImportExcelController::class, 'importShoemart'])->name('Customer.importShoemart');
Route::post('/admin/customer/importsmma', [ImportExcelController::class, 'importSmma'])->name('Customer.importSmma');