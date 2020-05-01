<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgrochemRequest extends FormRequest
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
            'product_name'=> 'required',
            'distributing_company'=> 'nullable',
            'registrant'=>'nullable',
            'type'=>'nullable',
            'phi_days'=>'nullable',
            'crops'=>'nullable',
            'image'=>'nullable',
            'active_ingredients'=>'nullable',
            'pests_disease_weed'=>'nullable'
        ];
    }
}
