<?php

namespace App\Http\Requests\User;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "name" => "required|string",
            "lname" => "required|string",
            "email" => "required|email|unique:users,email",
            "phone" => "required|numeric",
            "pwd1" => "required",
            "pwd2" => "required",
            "user_type" => "required"
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
