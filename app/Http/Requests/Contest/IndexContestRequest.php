<?php

namespace App\Http\Requests\Contest;

use App\Proyect;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class IndexContestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (auth()->user()->user_type == User::DIRECTOR && Proyect::where('id', $this->route('id'))->exists()) {
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
