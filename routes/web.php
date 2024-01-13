<?php

use App\Http\Controllers\TasksAdminController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [TasksController::class, 'index'])->name('dashboard');

    Route::get('/task', [TasksController::class, 'add']);
    Route::post('/task', [TasksController::class, 'create']);

    Route::get('/task/{task}', [TasksController::class, 'look']);
    Route::get('/task/edit/{task}', [TasksController::class, 'edit']);
    Route::post('/task/{task}', [TasksController::class, 'update']);

    Route::get('/admin', [TasksAdminController::class, 'lookUsers'])->name('admin');
    Route::get('/admin/user-{user}', [TasksAdminController::class, 'lookUser'])->name('admin.lookUser');
    Route::get('/admin/user-{user}/edit', [TasksAdminController::class, 'editUser'])->name('admin.editUser');
    Route::post('/admin/user-{user}/edit', [TasksAdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::post('/admin/user-{user}', [TasksAdminController::class, 'deleteUser'])->name('admin.deleteUser');

});
