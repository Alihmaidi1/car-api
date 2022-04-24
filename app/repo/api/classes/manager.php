<?php

namespace App\repo\api\classes;
use App\repo\api\interfaces\manager as managerInterface;
use App\Models\manager as managerModel;
class manager implements managerInterface{

    public function getAllManager(){

        return managerModel::all();

    }

    public function store($request)
    {

        $manager=new managerModel();
        $manager->name=$request->name;
        $manager->address=$request->address;
        $manager->birthDay=$request->birthDay;
        $manager->salary=$request->salary;
        $manager->save();
        return $manager;


    }

    public function update($request){


        $manager=managerModel::findOrFail($request->id);
        $manager->name=$request->name;
        $manager->address=$request->address;
        $manager->birthDay=$request->birthDay;
        $manager->salary=$request->salary;
        $manager->save();
        return $manager;


    }


    public function delete($id)
    {

        $manager=managerModel::findOrFail($id);
        $manager1=$manager;
        $manager->delete();
        return $manager1;


    }



}
