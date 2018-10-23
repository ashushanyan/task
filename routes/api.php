<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


*/


//DB::listen(function ($query)  use (&$count, &$logged){
//    try {
//        Log::info(Illuminate\Support\Str::replaceArray('?', $query->bindings, $query->sql));
//    } catch (\Exception $e) {
//        Log::info($query->sql, $query->bindings);
//    }
//});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

