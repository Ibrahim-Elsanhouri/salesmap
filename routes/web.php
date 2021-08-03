<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('map');
});
Route::get('/helper', function () {
   // return view('welcome');
   return $request->all();  

});

Route::get('/helper', [App\Http\Controllers\ClientController::class, 'helper'])->name('helper'); 


/*
Route::get('/map', function () {
    return view('map');
})->middleware('auth');
*/
Route::post('/sendmap', [App\Http\Controllers\ClientController::class, 'sendmap'])->name('sendmap')->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

