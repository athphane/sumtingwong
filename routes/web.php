<?php

use Athphane\Sumtingwong\Http\Controllers\SumtingwongsController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => config('sumtingwong.route_prefix'),
    'as'     => 'sumtingwongs.',
], function () {
    Route::get('/', [SumtingwongsController::class, 'index'])
        ->name('index');
    Route::get('/latest', [SumtingwongsController::class, 'latest'])
        ->name('latest');
    Route::get('/{id}', [SumtingwongsController::class, 'show'])
        ->name('show');
    Route::patch('/{id}', [SumtingwongsController::class, 'update'])
        ->name('update');
});

Route::redirect('sumtingwong', 'sumtingwongs');
