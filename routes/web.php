<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/add', [EmployeeController::class, 'create']);
Route::post('/employee/add', [EmployeeController::class, 'store']);

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/add', [DepartmentController::class, 'create']);
Route::post('/department/add', [DepartmentController::class, 'store']);
Route::get('/department/employee/{id}', [DepartmentController::class, 'show']);

Route::get('/role', [RoleController::class, 'index']);
Route::get('/role/add', [RoleController::class, 'create']);
Route::post('/role/add', [RoleController::class, 'store']);
