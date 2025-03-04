<?php

use App\Http\Controllers\API\Authentication\AuthController;
use App\Http\Controllers\API\SocialLogin\SocialLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//without jwt api middleware
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    // Route::get('all/users', 'index');
    Route::post('/password/forgot', 'forgotPassword');
    Route::post('/password/reset', 'resetPassword');
    Route::post('/password/verify-otp', 'verifyOtp');
    Route::post('/password/resend-otp', 'resendOtp');
     //Continue with google and facebook login
     Route::post('/social/login', [SocialLoginController::class, 'SocialLogin']);
});

//with jwt middlware api
Route::middleware('auth:api')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::delete('/delete-account', 'deleteAccount');
        Route::post('/profile/update/user', 'ProfileUpdate');
        Route::post('/password/update/user', 'ChangePassword');
    });
});
