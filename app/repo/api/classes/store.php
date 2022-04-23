<?php

namespace App\repo\api\classes;

use App\Models\manager;
use App\repo\api\interfaces\store as storeInterface;
use App\Models\store as storeModels;
class store implements storeInterface{


    public function getAllStores()
    {
        return storeModels::all();
    }

    public function store($request){

        $store=new storeModels();
        $store->name=$request->name;
        $store->address=$request->address;
        $store->manager_id=$request->manager_id;
        $store->save();
        return $store;

    }


    public function update($request){

        $store=storeModels::findOrFail($request->id);
        $store->name=$request->name;
        $store->address=$request->address;
        $store->manager_id=$request->manager_id;
        $store->save();
        return $store;




    }


    public function delete($id){

        $store=storeModels::findOrFail($id);
        $store1=$store;
        $store->delete();
        return $store1;

    }


    public function getStoreManager($id){

        $manager=manager::findOrFail($id);
        $stores=$manager->stores;
        return $stores;



    }



}
