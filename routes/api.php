<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

$baseRoute = 'api/';

Route::get($baseRoute, function () {
    return response()->json(['message' => 'hello world test']);
});
Route::get("{$baseRoute}csrf-token", function () {
    return response()->json([
        'csrf_token' => csrf_token(),
    ]);
});
Route::post("{$baseRoute}login", [UserController::class, 'login']);
Route::post("{$baseRoute}register", [UserController::class, 'register']);
