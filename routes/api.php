<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admins\admin;
use App\Http\Controllers\api\models\model;
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
    Route::post("/resetPassword",[admin::class,"resetPassword"]);
    Route::group(["middleware"=>["check_admin_token:admin_api"]],function(){

        Route::post("/admin.logout",[admin::class,"logout"]);
        Route::post("/updatePassword",[admin::class,"updatePassword"]);


        // model process

        Route::get("/getAllModel",[model::class,"getAllModel"]);
        Route::get("/findModel/{id}",[model::class,"findModel"]);
        Route::post("/model.store",[model::class,"store"]);
        Route::post("/model.update",[model::class,"update"]);
        Route::post("/model.delete",[model::class,"delete"]);


    });


});
