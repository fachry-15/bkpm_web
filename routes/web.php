<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::group(['namespace' => 'Frontend'], function () {
	Route::resource('home', 'HomeController');
});

Route::group(['namespace' => 'Backend'], function () {
	Route::resource('dashboard', 'DashboardController');
	Route::resource('pendidikan', 'PendidikanController');
	Route::resource('pengalaman_kerja', 'PengalamanKerjaController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'UploadController@upload')->name('upload');
Route::post('/upload/proses', 'UploadController@proses_upload')->name('upload.proses');
Route::post('/upload/resize', 'UploadController@resize_upload')->name('upload.resize');
Route::get('/dropzone', 'UploadController@dropzone')->name('dropzone');
Route::post('/dropzone/store', 'UploadController@dropzone_store')->name('dropzone.store');
Route::get('/pdf_upload', 'UploadController@pdf_upload')->name('pdf.upload');
Route::post('/pdf/store', 'UploadController@pdf_store')->name('pdf.store');
