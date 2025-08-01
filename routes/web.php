<?php

use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;

Route::get( '/allRows', [QueryController::class, 'allRows'] );
Route::get( '/singleRow', [QueryController::class, 'singleRow'] );
Route::get( '/findMethod', [QueryController::class, 'findMethod'] );
Route::get( '/pluckMethod', [QueryController::class, 'pluckMethod'] );
