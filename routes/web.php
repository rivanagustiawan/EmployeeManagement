<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/add', [EmployeeController::class, 'create']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::put('/employee/update/{id}', [EmployeeController::class, 'update']);
Route::post('/employee/add', [EmployeeController::class, 'store']);

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/add', [DepartmentController::class, 'create']);
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::post('/department/add', [DepartmentController::class, 'store']);
Route::put('/department/update/{id}', [DepartmentController::class, 'update']);
Route::get('/department/employee/{id}', [DepartmentController::class, 'show']);

Route::get('/role', [RoleController::class, 'index']);
Route::get('/role/add', [RoleController::class, 'create']);
Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
Route::put('/role/update/{id}', [RoleController::class, 'update']);
Route::post('/role/add', [RoleController::class, 'store']);


