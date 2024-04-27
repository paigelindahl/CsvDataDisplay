<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name('application');

Route::post('handleCsv', [CsvController::class, 'handleCsv'])->name('csv.handle');
