<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admins\admin;
use App\Http\Controllers\api\models\model;
use App\Http\Controllers\api\engines\engine;
use App\Http\Controllers\api\carTypes\carType;
use App\Http\Controllers\api\cars\car;
use App\Http\Controllers\api\managers\manager;
use App\Http\Controllers\api\stores\store;
use App\Http\Controllers\api\carStores\carStore;
use App\Http\Controllers\api\customers\customer;
use App\Http\Controllers\api\orders\order;
use App\Http\Controllers\api\employees\employe;
use App\Http\Controllers\api\orderDetails\orderDetail;

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

        // manager process
        Route::get("getAllManager",[manager::class,"getAllManager"]);
        Route::get("/findManager/{id}",[manager::class,"findManager"]);
        Route::post("/manager.store",[manager::class,"store"]);
        Route::post("/manager.update",[manager::class,"update"]);
        Route::post("/manager.delete",[manager::class,"delete"]);


        // store process
        Route::get("getAllstores",[store::class,"getAllStores"]);
        Route::get("/findStore/{id}",[store::class,"findStore"]);
        Route::post("/store.store",[store::class,"store"]);
        Route::post("/store.update",[store::class,"update"]);
        Route::post("/store.delete",[store::class,"delete"]);
        Route::get("/store.manager",[store::class,"getStoreManager"]);


        // carStore process
        Route::get("getAllcarStore",[carStore::class,"getAllCarStore"]);
        Route::get("/findCarStore/{id}",[carStore::class,"findCarStore"]);
        Route::post("/carStore.store",[carStore::class,"store"]);
        Route::post("/carStore.update",[carStore::class,"update"]);
        Route::post("/carStore.delete",[carStore::class,"delete"]);
        Route::post("/carStore.store",[carStore::class,"getCarstore_store"]);
        Route::post("/carStore.car",[carStore::class,"getCarstore_car"]);

        //customer process
        Route::get("getAllcustomer",[customer::class,"getAllcustomer"]);
        Route::get("/findcustomer/{id}",[customer::class,"findcustomer"]);
        Route::post("/customer.store",[customer::class,"store"]);
        Route::post("/customer.update",[customer::class,"update"]);
        Route::post("/customer.delete",[customer::class,"delete"]);

        // order process
        Route::get("getAllorder",[order::class,"getAllorder"]);
        Route::get("/findorder/{id}",[order::class,"findorder"]);
        Route::post("/order.store",[order::class,"store"]);
        Route::post("/order.update",[order::class,"update"]);
        Route::post("/order.delete",[order::class,"delete"]);
        Route::post("/order.customer",[order::class,"getOrdersCustomer"]);
        Route::post("/order.employeeDealing",[order::class,"getOrderFromEmployeeDealing"]);
        Route::post("/order.employeeService",[order::class,"getOrderFromEmployeeService"]);


        // employee process
        Route::get("getAllemployee",[employe::class,"getAllemployee"]);
        Route::get("/findemployee/{id}",[employe::class,"findemployee"]);
        Route::post("/employee.store",[employe::class,"store"]);
        Route::post("/employee.update",[employe::class,"update"]);
        Route::post("/employee.delete",[employe::class,"delete"]);
        Route::post("/employee.getStore",[employe::class,"getStore"]);

        // orderDetail process
        Route::get("getAllOrderDetail",[orderDetail::class,"getAllOrderDetail"]);
        Route::get("/findOrderDetail/{id}",[orderDetail::class,"findOrderDetail"]);
        Route::post("/orderDetail.store",[orderDetail::class,"store"]);
        Route::post("/orderDetail.update",[orderDetail::class,"update"]);
        Route::post("/orderDetail.delete",[orderDetail::class,"delete"]);
        Route::post("/orderDetail.getByorder",[orderDetail::class,"getByOrder"]);
        Route::post("/orderDetail.getBycarStore",[orderDetail::class,"getBycarStore"]);



    });


});
