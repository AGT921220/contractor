<?php

namespace App\Http\Requests\Client;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class IndexClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

       // return redirect()->route('')->with('message', "Lang::get('...')");
        //return redirect()->route('/')->with('message', "Lang::get('...')");
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
