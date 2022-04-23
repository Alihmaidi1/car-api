<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admins\admin;
use App\Http\Controllers\api\models\model;
use App\Http\Controllers\api\engines\engine;
use App\Http\Controllers\api\carTypes\carType;
use App\Http\Controllers\api\cars\car;
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

        // engine process
        Route::get("/getAllEngine",[engine::class,"getAllEngine"]);
        Route::get("/findEngine/{id}",[engine::class,"findEngine"]);
        Route::post("/engine.store",[engine::class,"store"]);
        Route::post("/engine.update",[engine::class,"update"]);
        Route::post("/engine.delete",[engine::class,"delete"]);
        Route::post("/engine.getModels",[engine::class,"getEngine"]);


        // Car Type Process

        Route::get("getAllType",[carType::class,"getAllType"]);
        Route::get("/findCarType/{id}",[carType::class,"findCarType"]);
        Route::post("/CarType.store",[carType::class,"store"]);
        Route::post("/CarType.update",[carType::class,"update"]);
        Route::post("/CarType.delete",[carType::class,"delete"]);


        // car process
        Route::get("getAllCar",[car::class,"getAllCar"]);
        Route::get("/findCar/{id}",[car::class,"findCar"]);
        Route::post("/Car.store",[car::class,"store"]);
        Route::post("/Car.update",[car::class,"update"]);
        Route::post("/Car.delete",[car::class,"delete"]);
        Route::get("car.engine",[car::class,"carsFromEngine"]);
        Route::get("car.type",[car::class,"carsFromType"]);

    });


});
