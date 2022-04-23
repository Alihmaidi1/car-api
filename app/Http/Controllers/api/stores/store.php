<?php

namespace App\Http\Controllers\api\stores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\api\interfaces\store as storeInterface;
use App\Models\store as storeModel;
use App\Http\Requests\api\stores\store as storeRequest;
use App\Http\Requests\api\stores\update;

class store extends Controller
{

    public $store;

    public function __construct(storeInterface $store)
    {
        $this->store=$store;
    }
    public function getAllStores(){

        try{

            $stores=$this->store->getAllStores();
            return response()->json(["data"=>$stores,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get The Stores"]);

        }

    }



    public function findStore($id){

        try{

            $store=storeModel::findOrFail($id);
            return response()->json(["data"=>$store->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){
            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't get The Store Data"]);


        }


    }


    public function store(storeRequest $request){

        try{

            $store=$this->store->store($request);
            return response()->json(["data"=>$store->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Add Store"]);


        }




    }




    public function update(update $request){

        try{
            $store=$this->store->update($request);
            return response()->json(["data"=>$store->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>200,"message"=>"We Can't Update Store Data"]);


        }




    }




    public function delete(Request $request){

        try{


            $store=$this->store->delete($request->id);
            return response()->json(["data"=>$store->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't delete store Data"]);


        }

    }


    public function getStoreManager(Request $request){

        try{

            $stores=$this->store->getStoreManager($request->id);
            return response()->json(["data"=>$stores,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){


            return response()->json(["data"=>[],"status"=>500,"message"=>"we Can't Get Stores For This Manager"]);

        }





    }





}
