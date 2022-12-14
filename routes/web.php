<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundMasterController;

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

Route::resource('fundmaster', FundMasterController::class);
Route::post('fundmaster/create', [FundMasterController::class, 'create']);
Route::get('fundmaster/edit/{id}', [FundMasterController::class, 'edit']);
Route::get('fundmaster/delete/{id}', [FundMasterController::class, 'delete']);
Route::post('fundmaster/update', [FundMasterController::class, 'update']);
