<?php
namespace App\repo\api\classes;
use App\repo\api\interfaces\carType as carTypeInterface;
use App\Models\carType as typeModel;
class carType implements carTypeInterface{


    public function getAllType()
    {
        return typeModel::all();
    }

    public function store($request)
    {

        $type=new typeModel();
        $type->name=$request->name;
        $type->save();
        return $type;

    }


    public function update($request)
    {

        $type=typeModel::findOrFail($request->id);
        $type->name=$request->name;
        $type->save();
        return $type;
    }

    public function delete($id)
    {
        $type=typeModel::findOrFail($id);
        $carType=$type;
        $type->delete();
        return $carType;

    }


}
