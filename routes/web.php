<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;

// log in route
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// log out route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// dashboard route
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth')->name('dashboard');

// redirect from / to /dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth', 'verified'])->group(function(){
    // employee route
    Route::resource('employee', EmployeeController::class)->except(['show']);
    // department route
    Route::resource('department', DepartmentController::class)->except(['show']);
    // position route
    Route::resource('position', PositionController::class)->except(['show']);
    // attendance route
    Route::resource('attendance', AttendanceController::class)->except(['show']);
    // salary route
    Route::resource('salary', SalaryController::class)->except(['show']);
    // admin route
    Route::resource('user', UserController::class)->except(['show', 'update']);
    Route::put('/user/{user}/update-username', [UserController::class, 'updateUsername'])->name('user.updateUsername');
    Route::put('/user/{user}/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
});