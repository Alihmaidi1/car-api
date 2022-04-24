<?php

namespace App\Http\Requests\api\orderDetails;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            "order_id"=>"required|exists:orders,id",
            "carStore_id"=>"required|exists:store_cars,id",
            "quantity"=>"required",
            "id"=>"required|exists:order_details,id"


        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){


        throw new HttpResponseException(

            response()->json(["data"=>[],"status"=>402,"message"=>$validator->errors()->first()])

        );
    }

}
