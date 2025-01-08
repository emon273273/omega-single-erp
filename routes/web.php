<?php

use App\Http\Controllers\emonController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    if(env('APP_SETUP') === false) {
        return redirect('/install');
    }
    return view('welcome');
});

Route::get('/install', [App\Http\Controllers\SetupController::class, 'index']);
Route::post('/install', [App\Http\Controllers\SetupController::class, 'setup']);

/// for increase my knowledge orm 

Route::get("/api",[emonController::class,"show"]);
