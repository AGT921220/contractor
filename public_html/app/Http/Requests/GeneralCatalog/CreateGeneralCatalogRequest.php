<?php

namespace App\Http\Requests\GeneralCatalog;


use App\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateGeneralCatalogRequest extends FormRequest
{
    /**
     * Determine if the GeneralCatalog is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if(auth()->user()->user_type==User::DIRECTOR){
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
            //
        ];
    }
}
