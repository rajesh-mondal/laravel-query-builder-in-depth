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

Route::get( '/whereClause', [QueryController::class, 'whereClause'] );
Route::get( '/advanceWhere', [QueryController::class, 'advanceWhere'] );
Route::get( '/whereNull', [QueryController::class, 'whereNull'] );
Route::get( '/whereIn', [QueryController::class, 'whereIn'] );
Route::get( '/whereDateTime', [QueryController::class, 'whereDateTime'] );
Route::get( '/whereColumn', [QueryController::class, 'whereColumn'] );

Route::get( '/orderBy', [QueryController::class, 'orderBy'] );
Route::get( '/randomOrder', [QueryController::class, 'randomOrder'] );
Route::get( '/latest', [QueryController::class, 'latest'] );
Route::get( '/oldest', [QueryController::class, 'oldest'] );
Route::get( '/skipTake', [QueryController::class, 'skipTake'] );
Route::get( '/having', [QueryController::class, 'having'] );

Route::get( '/insert', [QueryController::class, 'insert'] );

Route::get( '/pagination', [QueryController::class, 'pagination'] );