<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class QueryController extends Controller {
    // Retrieving All Rows
    function allRows() {
        $products = DB::table( 'products' )->get();
        return $products;
    }

    // Retrieving Single Row
    function singleRow() {
        $result = DB::table( 'products' )->first();
        return $result;
    }

    // Retrieving Single Row using Find Method
    function findMethod() {
        $result = DB::table( 'brands' )->find( 2 );
        return $result;
    }

    // Retrieving List of Column Values
    function pluckMethod() {
        $result = DB::table( 'brands' )->pluck( 'brandName', "id" );
        return $result;
    }
}
