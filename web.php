<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['isadmin', 'prevent-back-history']], function () {
    Route::get('admin-view', [HomeController::class, 'adminView']);

    Route::get('chart', [HomeController::class, 'chart'])->name('chart');
    Route::get('sb', function () {
        return view('layouts.sidebar');
    });

    Route::get('userprofile', function () {
        return view('userprofile');
    });
    Route::get('app', function () {
        return view('layouts.app');
    });

    Route::get('userprofile/{id}', [HomeController::class, 'update']);
    Route::post('updatesave', [HomeController::class, 'updatesave'])->name('updatesave');

});
Route::get('emp', [HomeController::class, 'employees']);
Route::get('forgotpassword', [HomeController::class, 'forgotpassword']);
Route::post('changePasswordPost', [HomeController::class, 'changePasswordPost']);
