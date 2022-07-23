<?php

namespace App\Http\Requests\Client;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (auth()->user()->user_type == User::DIRECTOR) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "company" => "required|string",
            "rfc" => "required|string",
            "reg_patronal" => "required",
            "rep_legal" => "required||string",
            "address" => "required||string",
            "email" => "required||string|email",
            "phone" => "required|numeric"
        ];
    }

    public function withValidator($validator){

        $validator->after(function($validator){
            if($this->input('pwd1')!=$this->input('pwd2')){
                $validator->errors()->add(
                    'pwd1','Las contraseñas deben ser iguales.'
                );
                return back()->with('error','Las contraseñas deben ser iguales');

            }
        });
    }
}
