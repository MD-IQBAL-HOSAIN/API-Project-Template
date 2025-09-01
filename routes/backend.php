<?php

use App\Http\Controllers\Web\Backend\AdminController;
use App\Http\Controllers\Web\Backend\CmsController;
use App\Http\Controllers\Web\Backend\DynamicPageController;
use App\Http\Controllers\Web\Backend\OrderController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Settings\MapSettingController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\StripeSettingController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;
use App\Http\Controllers\Web\Backend\TaxController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;










Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

//route for Banner
Route::controller(CmsController::class)->group(function () {
    Route::get('/banner/list', 'index')->name('banner.index');
    Route::get('/banner/create', 'create')->name('banner.create');
    Route::post('/banner/store', 'store')->name('banner.store');
    Route::get('/banner/edit/{id}', 'edit')->name('banner.edit');
    Route::post('/banner/update/{id}', 'update')->name('banner.update');
    Route::get('/banner/status/{id}', 'status')->name('banner.status');
    Route::delete('/banner/delete/{id}', 'destroy')->name('banner.destroy');

});

//route for Dynamic page
Route::controller(DynamicPageController::class)->group(function () {
    Route::get('/dynamic', 'index')->name('dynamic.index');
    Route::get('/dynamic/edit/{id}', 'edit')->name('dynamic.edit');
    Route::post('/dynamic/update/{id}', 'update')->name('dynamic.update');
    Route::get('/dynamic/status/{id}', 'status')->name('dynamic.status');
});


    //! Route for Profile Settings
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.setting');
        Route::patch('/update-profile', 'UpdateProfile')->name('update.profile');
        Route::put('/update-profile-password', 'UpdatePassword')->name('update.Password');
        Route::post('/update-profile-picture', 'UpdateProfilePicture')->name('update.profile.picture');
    });

    //! Route for System Settings
    Route::controller(SystemSettingController::class)->group(function () {
        Route::get('/system-setting', 'index')->name('system.index');
        Route::patch('/system-setting', 'update')->name('system.update');
    });

    //! Route for Mail Settings
    Route::controller(MailSettingController::class)->group(function () {
        Route::get('/mail-setting', 'index')->name('mail.setting');
        Route::patch('/mail-setting', 'update')->name('mail.update');
    });

    //! Route for Stripe Settings
    Route::controller(StripeSettingController::class)->group(function () {
        Route::get('/stripe-setting', 'index')->name('stripe.index');
        Route::get('/google-setting', 'google')->name('google.index');
        Route::patch('/credentials-setting', 'update')->name('credentials.update');
    });

    //! Route for Stripe Settings
    Route::controller(MapSettingController::class)->group(function () {
        Route::get('/map-setting', 'index')->name('map.index');
        Route::patch('/map-setting', 'update')->name('map.update');
    });

});
