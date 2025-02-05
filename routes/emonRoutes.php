<?php

use App\Http\Controllers\BooksController;
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

// Route::middleware('permission:create-test')->post("/", [emonController::class, 'createSingleTest']);

// Route::middleware('permission:readAll-test')->get("/", [emonController::class, 'getAllTest']);

// Route::middleware('permission:readAll-test')->get("/{id}", [emonController::class, 'getSingleTest']);

// Route::middleware('permission:update-test')->put("/{id}", [emonController::class, 'updateSingleTest']);

// Route::middleware('permission:delete-test')->patch("/{id}", [emonController::class, 'deleteSingleTest']);
Route::middleware('permission:create-emon')->post("/",[BooksController::class,'createSingleEmon']);
Route::middleware("permission:readAll-emon")->get("/",[BooksController::class,'getAllEmon']);
Route::middleware('permission:readAll-emon')->get("/{id}",[BooksController::class,'getSingleEmon']);

Route::middleware("permission:update-emon")->put("/{id}",[BooksController::class,'updateSingleEmon']);
Route::middleware("permission:delete-emon")->delete("/{id}",[BooksController::class,'deleteSingleEmon']);

// Route::get('/',[BooksController::class,'allbook']);
// Route::post("/create",[BooksController::class,"storebook"]);
// Route::get("/find/{id}",[BooksController::class,"show"]);
// Route::put("/update/{id}",[BooksController::class,"updatebook"]);
// Route::delete('/delete/{id}',[BooksController::class,"deletebook"]);

//Route::middleware('permission:update-')