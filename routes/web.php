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
    return view('auth.login');
});

// Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function() {

    Route::get('/', 'AdminController@index');

    Route::resource('siswa', 'StudentController')->parameters([
        'siswa' => 'rfid'
    ]);
    Route::get('siswa/destroy/{rfid}', 'StudentController@destroy');
    Route::get('student/json','StudentController@json');
    // Route::get('/siswa/json', 'StudentController@datajson')->name('json');
    
    Route::resource('kelas', 'ClassController');
    Route::put('kelas/update/{id}', 'ClassController@update');
    Route::get('class/json','ClassController@json');
    Route::get('kelas/destroy/{id}', 'ClassController@destroy');


    Route::resource('posts', 'PostController');
    Route::get('pengumuman/json', 'PostController@json');
    Route::get('posts/destroy/{post}', 'PostController@destroy');


    Route::get('laporan', 'ReportController@index');
    // Route::get('laporan/json', 'ReportController@json');
    Route::get('/laporan/pdf','ReportController@pdf');

    // Setting
    Route::get('/pengaturan', 'SettingController@index');
    Route::post('/pengaturan/waktu', 'SettingController@changeTime');
    
});

// Form presensi raspberry pi
Route::get('/presensi', 'PresencesController@index');
Route::post('/presensi', 'PresencesController@ajaxRequestPost');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/send-notification', 'PresencesController@sendNotification')->name('send.notification');