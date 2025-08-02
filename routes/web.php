<?php

use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;

Route::get( '/allRows', [QueryController::class, 'allRows'] );
Route::get( '/singleRow', [QueryController::class, 'singleRow'] );
Route::get( '/findMethod', [QueryController::class, 'findMethod'] );
Route::get( '/pluckMethod', [QueryController::class, 'pluckMethod'] );

Route::get( '/aggregates', [QueryController::class, 'aggregates'] );

Route::get( '/selectClauses', [QueryController::class, 'selectClauses'] );

Route::get( '/innerJoin', [QueryController::class, 'innerJoin'] );
Route::get( '/leftJoin', [QueryController::class, 'leftJoin'] );
Route::get( '/crossJoin', [QueryController::class, 'crossJoin'] );
Route::get( '/advancedJoin', [QueryController::class, 'advancedJoin'] );

Route::get( '/union', [QueryController::class, 'union'] );