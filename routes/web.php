<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('dashboard', [AssignmentController::class, 'dashboard'])->middleware(['auth']);

Route::get('add-dept', [AssignmentController::class, 'addDept']);

Route::post('save-dept', [AssignmentController::class, 'saveDept']);

Route::get('edit-dept/{id}', [AssignmentController::class, 'editDept']);

Route::post('update-dept', [AssignmentController::class, 'updateDept']);

Route::get('delete-dept/{id}', [AssignmentController::class, 'deleteDept']);

Route::get('register', [AssignmentController::class, 'register'])->name('register');

Route::get('login', [AssignmentController::class, 'login'])->name('login');

Route::post('save-user', [AssignmentController::class, 'saveUser']);

Route::post('user-login', [AssignmentController::class, 'userLogin']);

Route::get ('logout', [AssignmentController::class, 'logout'])->name('logout');