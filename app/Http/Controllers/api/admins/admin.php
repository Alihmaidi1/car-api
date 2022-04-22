<?php

namespace App\Http\Controllers\api\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\api\interfaces\admin as adminInterface;
use Illuminate\Support\Facades\Validator;
class admin extends Controller
{


    public $admin;
    public function __construct(adminInterface $admin)
    {
        $this->admin=$admin;
    }

    public function store(Request $request){


        $roles=[
            "email"=>"required|email",
            "password"=>"required",
            "name"=>"required|min:8|max:50"
        ];
        $validate=Validator::make($request->all(),$roles);
        if($validate->fails()){
            return response()->json(["status"=>500,"message"=>$validate->errors()->first(),"data"=>[]]);
        }

        $admin=$this->admin->store($request);
        $token=auth("admin_api")->login($admin);
        $admin=$admin->toArray();
        $admin["token"]=$token;
        return response()->json(["message"=>"Success","data"=>$admin,"status"=>200]);
    }



    public function login(Request $request){




    }




}
