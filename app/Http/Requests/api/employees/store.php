<?php

namespace App\Http\Requests\api\employees;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class store extends FormRequest
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

            "name"=>"required",
            "address"=>"required",
            "salary"=>"required",
            "store_id"=>"required|exists:stores,id"

        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){

        throw new HttpResponseException(

            response()->json(["data"=>[],"status"=>402,"message"=>$validator->errors()->first()])

        );
    }


}
