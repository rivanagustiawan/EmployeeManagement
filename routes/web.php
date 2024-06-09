<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/employee', [DashboardController::class, 'employee']);
Route::get('/department', [DashboardController::class, 'department']);
Route::get('/role', [DashboardController::class, 'role']);
Route::get('/department/employee/{id}', [DashboardController::class, 'departmentEmployee']);
