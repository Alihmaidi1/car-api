<?php

namespace App\Http\Controllers\api\managers;

use App\Http\Controllers\Controller;
use App\Models\manager as ModelsManager;
use Illuminate\Http\Request;
use App\repo\api\interfaces\manager as managerInterface;
use App\Http\Requests\api\managers\store as storeRequest;
use App\Http\Requests\api\managers\update;

class manager extends Controller
{

    public $manager;
    public function __construct(managerInterface $manager)
    {

        $this->manager=$manager;

    }

    public function getAllManager(){

        try{

            $managers=$this->manager->getAllManager();
            return response()->json(["data"=>$managers,"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Get All Manager"]);

        }


    }



    public function findManager($id){

        try{

            $manager=ModelsManager::findOrFail($id);
            return response()->json(["data"=>$manager->toArray(),"status"=>200,"message"=>"Success"]);
        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't get Manager Data"]);

        }

    }



    public function store(storeRequest $request){

        try{

            $manager=$this->manager->store($request);
            return response()->json(["data"=>$manager->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $request){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Add Manager"]);
        }

    }



    public function update(update $request){

        try{

            $manager=$this->manager->update($request);

            return response()->json(["data"=>$manager->toArray(),"status"=>200,"message"=>"Success"]);


        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Update Manager Data"]);


        }



    }



    public function delete(Request $request){

        try{

            $manager=$this->manager->delete($request->id);
            return response()->json(["data"=>$manager->toArray(),"status"=>200,"message"=>"Success"]);

        }catch(\Exception $ex){

            return response()->json(["data"=>[],"status"=>500,"message"=>"We Can't Delete Manager"]);


        }




    }



}


