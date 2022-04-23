<?php

namespace App\Http\Controllers\api\admins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\api\interfaces\admin as adminInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\api\admins\store as storeRequest;
use App\Http\Requests\api\admins\login as loginRequest;
use App\Http\Requests\api\admins\reset_password as reset_passwordRequest;
use App\Http\Requests\api\admins\updatePassword as updatePasswordRequest;
use App\Mail\resetPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\admin as modelsadmin;
use Illuminate\Support\Facades\Hash;

class admin extends Controller
{


    public $admin;
    public function __construct(adminInterface $admin)
    {
        $this->admin=$admin;
    }


    public function store(storeRequest $request){
        $admin=$this->admin->store($request);
        $token=auth("admin_api")->login($admin);
        $admin=$admin->toArray();
        $admin["token"]=$token;
        return response()->json(["message"=>"Success","data"=>$admin,"status"=>200]);
    }



    public function login(loginRequest $request){

        $token=Auth::guard("admin_api")->attempt(["email"=>$request->email,"password"=>$request->password]);
        if($token){

                return response(["status"=>200,"message"=>"Success","data"=>["token"=>$token,"email"=>$request->email,"password"=>$request->password]]);

        }else{

        return response(["status"=>404,"message"=>"The Email Or Password Is Not Correct","data"=>[]]);

        }

    }


    public function logout(Request $request){

        auth("admin_api")->logout();
        return response()->json(["status"=>200,"message"=>"Success","data"=>[]]);

    }

    public function resetPassword(reset_passwordRequest $request){

        try{
            $user=modelsadmin::where("email",$request->email)->first();
            $token=auth("admin_api")->login($user);
            Mail::to($request->email)->send(new resetPassword($request->email,$token));

            return response()->json(["status"=>200,"message"=>"The Email Was Sended Successfully","data"=>[]]);

        }catch(\Exception $e){

            return response()->json(["status"=>500,"message"=>"email Not Sended","data"=>[]]);
        }

    }


    public function updatePassword(updatePasswordRequest $request){

        try{
            $admin=$this->admin->updatePassword($request);
            $user=$admin->toArray();
            $user["token"]=auth("admin_api")->login($admin);
            return response()->json(["data"=>$user,"message"=>"The Password Was Updated Successfully","status"=>200]);

        }catch(\Exception $e){

            return response()->json(["status"=>500,"message"=>"the Password can't reset it","data"=>[]]);


        }





    }







}
