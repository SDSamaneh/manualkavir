<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\ClassController;
use App\Http\Controllers\dashboard\ManualsController;
use App\Http\Controllers\dashboard\MotorModelController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/auth/register');

//Front Auth Routes
Route::prefix('/auth')->middleware('guest')->group(function () {
    //Auth Route
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


//Dashboard Routes
Route::prefix('/dashboard')->middleware('auth')->group(function () {

    Route::middleware('role:author|admin')->group(function () {
        
        Route::resource('brand', BrandController::class);

        Route::resource('class', ClassController::class);

        Route::resource('motormodel', MotorModelController::class);

        Route::resource('user', UserController::class);

        // روت آپلود فایل
        Route::post('/manual/upload', [ManualsController::class, 'store'])->name('manual.upload');
    });

    Route::middleware('role:author|admin|subscriber')->group(
        function () {
            Route::resource('manuals', ManualsController::class);
            Route::get('get-classes/{brand}', [BrandController::class, 'getClasses']);
            Route::get('get-models/{class}', [MotorModelController::class, 'getModels']);
            Route::get('get-classes/{brandId}', [ClassController::class, 'getClasses'])->name('get-classes');
            Route::get('manuals/{id}/download/{field}', [ManualsController::class, 'download'])->name('manuals.download');
            //profile route

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        }
    );
});
