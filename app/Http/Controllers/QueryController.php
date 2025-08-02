<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

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

    // Aggregates method
    function aggregates() {
        $count = DB::table( 'products' )->count();
        $max = DB::table( 'products' )->max( 'price' );
        $min = DB::table( 'products' )->min( 'price' );
        $avg = DB::table( 'products' )->avg( 'price' );
        $sum = DB::table( 'products' )->sum( 'price' );

        return ['count' => $count, 'max' => $max, 'min' => $min, 'avg' => $avg, 'sum' => $sum];
    }

    // Select Clause
    function selectClauses() {
        $result = DB::table( 'products' )->select( 'title', 'price', 'stock' )->get();
        // $result = DB::table( 'products' )->select( 'title' )->distinct()->get();
        return $result;
    }

    // Inner Join
    function innerJoin() {
        $products = DB::table( 'products' )
            ->join( 'categories', 'products.category_id', '=', 'categories.id' )
            ->join( 'brands', 'products.brand_id', '=', 'brands.id' )
            ->get();
        return $products;
    }

    // Left Join
    function leftJoin() {
        $products = DB::table( 'products' )
            ->leftJoin( 'categories', 'products.category_id', '=', 'categories.id' )
            ->leftJoin( 'brands', 'products.brand_id', '=', 'brands.id' )
            ->get();
        return $products;
    }

    // Cross Join
    function crossJoin() {
        $result = DB::table( 'products' )
            ->crossJoin( 'brands' )
            ->get();

        return $result;
    }

    // Advanced Join Clauses
    function advancedJoin() {
        $result = DB::table( 'products' )
            ->join( 'categories', function ( JoinClause $join ) {
                $join->on( 'products.category_id', '=', 'categories.id' )
                    ->where( 'products.price', '>', 2000 );
            } )->get();

        return $result;
    }

    // Unions
    function union() {
        $query = DB::table( 'products' )->where( 'products.price', '>', 2000 );
        $otherQuery = DB::table( 'products' )->where( 'products.discount', '=', 1 )->union( $query )->get();
        return $otherQuery;
    }

}
