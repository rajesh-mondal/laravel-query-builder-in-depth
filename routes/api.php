<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post( '/insert-request', [QueryController::class, 'insertRequest'] );
Route::post( '/update/{id}', [QueryController::class, 'update'] );
Route::post( '/upsert/{brandName}', [QueryController::class, 'updateOrInsert'] );
Route::post( '/delete/{id}', [QueryController::class, 'delete'] );
