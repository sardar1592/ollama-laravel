<?php

use App\Http\Controllers\AskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('ask', [AskController::class, '__invoke']);
