<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//routes Api

Route::get('/tasks', [ApiController::class, 'get']);

Route::get('/tasks/{id}', [ApiController::class, 'getId'] );

Route::post('/tasks', [ApiController::class, 'store'] );

Route::put('/tasks/{id}', [ApiController::class, 'update'] );

Route::delete('/tasks/{id}', [ApiController::class, 'delete'] );