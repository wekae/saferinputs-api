<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalNamesRequest extends FormRequest
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
    public function rules(){
        return [
            'language_ethnic_group'=> 'nullable',
            'english_name'=> 'nullable',
            'local_name'=>'nullable',
            'category'=>'nullable',
            'region'=>'nullable',
        ];
    }
}
