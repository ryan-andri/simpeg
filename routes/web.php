<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PendataanController;

Route::get('/', function () {
    return view('index');
});

Route::resource('pendataan', PendataanController::class);
