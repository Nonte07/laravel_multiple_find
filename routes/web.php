<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\mycontroller;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/',[mycontroller::class,'th']);
Route::post('formsubmit',[mycontroller::class,'formsubmit']);
Route::post('editdata/update',[mycontroller::class,'updated']);

Route::get('deletedata/{id}',[mycontroller::class,'deletedata']);
Route::get('editdata/{id}',[mycontroller::class,'editdata']);
Route::get('filter',[mycontroller::class,'filteer']);


