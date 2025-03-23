<?php

use App\Http\Controllers\CreateInvoiceController;
use App\Providers\TestDataProvider;
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

Route::view('/', 'welcome');
Route::view('/template', 'invoice-template', TestDataProvider::testData());
Route::resource('/create-invoice', CreateInvoiceController::class);
