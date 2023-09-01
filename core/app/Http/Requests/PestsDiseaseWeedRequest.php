<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PestsDiseaseWeedRequest extends FormRequest
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
            'name'=> 'required',
            'type'=> 'nullable',
            'scientific_name'=>'nullable',
            'description_pest'=>'nullable',
            'description_impact'=>'nullable',
            'crops'=>'nullable',
            'image'=>'nullable',
            'references'=>'nullable',
            'local_names'=>'nullable',
            'agrochem_products'=>'nullable',
            'gap'=>'nullable',
            'homemade_organic'=>'nullable',
            'commercial_organic'=>'nullable',
        ];
    }
}
