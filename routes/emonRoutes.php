<?php

use App\Http\Controllers\emonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('permission:create-test')->post("/", [emonController::class, 'createSingleTest']);

Route::middleware('permission:readAll-test')->get("/", [emonController::class, 'getAllTest']);

Route::middleware('permission:readAll-test')->get("/{id}", [emonController::class, 'getSingleTest']);

Route::middleware('permission:update-test')->put("/{id}", [emonController::class, 'updateSingleTest']);

Route::middleware('permission:delete-test')->patch("/{id}", [emonController::class, 'deleteSingleTest']);
