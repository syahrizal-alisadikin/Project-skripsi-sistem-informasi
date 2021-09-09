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

// Route::get('/', function () {
//     return view('pages.user.home');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/Detail-Class/{id}', 'UserController@detail')->name('detail');
Route::get('/Kelas/{id}', 'UserController@detailPay')->name('paymentDetail');
Route::get('/Kelas', 'UserController@kelas')->name('class')->middleware('auth');
Route::post('/Checkout', 'UserController@checkout')->name('checkout');
Route::post('/Payment-Class/{id}', 'UserController@payment')
    ->name('payment');
Route::post('/checkout/callback', 'UserController@callback')->name('midtrans-callback');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard','DashboardController@index')->name('admin.dashboard.index');
        Route::resource('kelas','KelasController');
        Route::resource('transaction','TransactionController');
        Route::resource('materi','MateriController');
        Route::resource('includes','IncludesController');
        Route::resource('users','CustomerController');
        Route::resource('peserta','PesertaController');
        Route::resource('instruktur','InstrukturController');
    });
Auth::routes();

