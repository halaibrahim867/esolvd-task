<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Role\RoleController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::group(['prefix' => 'sign/'], function () {
    Route::post('up',[AuthController::class, 'signUp']);
    Route::post('in',[AuthController::class, 'signIn']);
    Route::post('out',[AuthController::class, 'signOut'])->middleware('auth:api');
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
});
