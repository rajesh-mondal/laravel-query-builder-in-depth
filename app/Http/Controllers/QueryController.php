<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
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

    // Basic Where Clauses
    function whereClause() {
        $result = DB::table( 'products' )
            ->where( 'products.price', '>=', 2000 )
            // ->where( 'products.title', 'LIKE', '%Sho%' )
            ->get();
        return $result;
    }

    // Advance Where Clauses
    function advanceWhere() {
        $result = DB::table( 'products' )
            ->where( 'products.price', '>', 2000 )
            ->orWhere( 'products.price', '=', 1000 )
            // ->whereNot( 'products.price', '=', 1000 )
            // ->whereBetween( 'price', [1, 1500] )
            ->get();
        return $result;
    }

    function whereNull() {
        $result = DB::table( 'products' )
            ->whereNull( 'price' )
            // ->whereNotNull( 'price' )
            ->get();
        return $result;
    }

    function whereIn() {
        $result = DB::table( 'products' )
            ->whereIn( 'price', [1000, 5000] )
            // ->whereNotIn( 'price', [1000, 5000] )
            ->get();
        return $result;
    }

    function whereDateTime() {
        $result = DB::table( 'brands' )
            ->whereDate( 'created_at', '2023-02-19')
            // ->whereMonth( 'created_at', '02')
            // ->whereDay( 'created_at', '19')
            // ->whereYear( 'created_at', '2023')
            // ->whereTime( 'created_at', '20:05:15')
            ->get();
        return $result;
    }

    function whereColumn() {
        $result = DB::table( 'brands' )
            ->whereColumn( 'created_at', '<', 'updated_at')
            ->get();
        return $result;
    }

    // Ordering
    function orderBy() {
        $affected = DB::table( 'brands' )
            ->orderBy( 'brandName', 'desc' )
            ->get();
        return $affected;
    }

    function randomOrder() {
        $affected = DB::table( 'brands' )
            ->inRandomOrder()
            ->first();
        return $affected;
    }

    // Latest & Oldest
    function latest() {
        $affected = DB::table( 'brands' )->latest()->first();
        return $affected;
    }

    function oldest() {
        $affected = DB::table( 'brands' )->oldest()->first();
        return $affected;
    }

    // Skip & Take
    function skipTake() {
        $affected = DB::table( 'products' )
            ->skip( 2 )
            ->take( 3 )
            ->get();
        return $affected;
    }

    // groupBy and having
        function having() {
        $affected = DB::table( 'products' )
            ->groupBy( 'price' )
            ->having( 'price', '>', 2000 )
            ->get();
        return $affected;
    }
}
