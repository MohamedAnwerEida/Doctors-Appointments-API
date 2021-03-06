<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('appointments', 'App\Http\Controllers\AppointmentsController');
Route::delete('/appointments/destroy/all','AppointmentsController@multi_delete');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en']) ) {
        session()->put('app_locale', $locale);
        return back();
    }
    return view('errors.404');
});
