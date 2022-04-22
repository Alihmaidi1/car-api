<?php

namespace App\Http\Requests\api\admins;

use Exception;
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
            "email"=>"required|email",
            "password"=>"required",
            "name"=>"required|min:8|max:50"
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){

        throw new HttpResponseException(
         response()->json(["status"=>500,"message"=>$validator->errors()->first(),"data"=>[]])
    );

    }


}
