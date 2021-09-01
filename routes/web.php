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
    return view('pages.user.home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard','DashboardController@index')->name('admin.dashboard.index');
        Route::resource('kelas','KelasController');
        Route::resource('transaction','TransactionController');
        Route::resource('materi','MateriController');
        Route::resource('includes','IncludesController');
        Route::resource('customer','CustomerController');
        Route::resource('peserta','PesertaController');
        Route::resource('instruktur','InstrukturController');
    });
Auth::routes();

