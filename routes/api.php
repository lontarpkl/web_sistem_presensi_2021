<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/coba', function() {
    return response()->json(
        ["message" => "Sukses"]
    );
});



Route::post('/login','Api\AuthController@login');

Route::group(['middleware' => 'auth:student'], function(){

    
    Route::post('/save-token', 'Api\AuthController@saveToken'); 
    // Logout
    Route::post('/logout', 'Api\AuthController@logout');
    // Ganti Password
    Route::post('/change-password', 'Api\AuthController@changePassword');
    // Ganti foto profile
    Route::post('/photo-profile', 'Api\StudentController@uploadPhoto');

    //  Menampilkan data siswa dan presensi
    Route::get('/details', 'Api\AuthController@details');
    Route::get('/presences', 'Api\PresencesController@present');
    Route::get('/posts', 'Api\PostController@list');
    Route::get('/posts/detail/{post}', 'Api\PostController@detail');

    Route::get('/report', 'Api\PresencesController@report');
});
