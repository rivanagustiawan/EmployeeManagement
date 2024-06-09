<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;

Route::get('login', function() {
    return view('pages.login');
});


Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function () {

    Route::resource('employee', EmployeeController::class);

    Route::resource('department', DepartmentController::class);

    Route::resource('role', RoleController::class);

    // Route::get('/department', [DepartmentController::class, 'index']);
    // Route::get('/department/add', [DepartmentController::class, 'create']);
    // Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
    // Route::post('/department/add', [DepartmentController::class, 'store']);
    // Route::put('/department/update/{id}', [DepartmentController::class, 'update']);

    // Route::get('/role', [RoleController::class, 'index']);
    // Route::get('/role/add', [RoleController::class, 'create']);
    // Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
    // Route::put('/role/update/{id}', [RoleController::class, 'update']);
    // Route::post('/role/add', [RoleController::class, 'store']);
});




