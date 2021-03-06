<?php
namespace App\repo\api\classes;

use App\Models\car;
use App\repo\api\interfaces\carStore as carStoreInterface;
use App\Models\storeCar as carStoreModel;
use App\Models\store as storeModels;
class carStore implements carStoreInterface{

    public function getAllCarStore()
    {

        return carStoreModel::all();

    }


    public function store($request)
    {

        $carStore=new carStoreModel();
        $carStore->quantity=$request->quantity;
        $carStore->store_id=$request->store_id;
        $carStore->car_id=$request->car_id;
        $carStore->save();
        return $carStore;

    }


    public function update($request)
    {

        $carStore=carStoreModel::findOrFail($request->id);
        $carStore->quantity=$request->quantity;
        $carStore->store_id=$request->store_id;
        $carStore->car_id=$request->car_id;
        $carStore->save();
        return $carStore;


    }




    public function delete($id)
    {

        $carStore=carStoreModel::findOrFail($id);
        $carStore1=$carStore;
        $carStore->delete();
        return $carStore;
    }


    public function getCarstore_store($id)
    {

        $store=storeModels::findOrFail($id);
        $carStores=$store->carStore;
        return $carStores;

    }

    public function getCarStore_car($id)
    {

        $car=car::findOrFail($id);
        $carStores=$car->storeCar;
        return $carStores;

    }

}
