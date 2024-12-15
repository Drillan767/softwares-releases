<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoftwaresController;

Route::get('/', [SoftwaresController::class, 'index']);
Route::get('/orchestral-range-tool/{target}/{current_version}', [SoftwaresController::class, 'orchestrationTools']);
Route::get('/test-github-curl', [SoftwaresController::class, 'testGithubCurl']);