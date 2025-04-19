<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

//main screen
Route::get('/', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth'])->group(function(){

    //Get tasks list
    Route::get('/tasks', [TaskController::class, 'get'] );
    
    //get task for id
    Route::get('/tasks/{id}', [TaskController::class, 'getId'] );
    
    //create task
    Route::post('/tasks', [TaskController::class, 'store'] );
    
    //update task
    Route::put('/tasks/{id}', [TaskController::class, 'update'] );
    
    //delete task
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'] );
    
    //logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
