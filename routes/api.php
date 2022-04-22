<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admins\admin;
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
Route::group(["middleware"=>["api","api_password"]],function(){

    Route::post("/admin.store",[admin::class,"store"]);
    Route::post("/admin.login",[admin::class,"login"]);


    Route::group(["middleware"=>["check_admin_token:admin_api"]],function(){

        Route::post("/admin.logout",[admin::class,"logout"]);




    });


});
