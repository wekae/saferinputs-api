<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommercialOrganicRequest extends FormRequest
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
            'manufacturer'=> 'nullable',
            'distributor'=>'nullable',
            'contact_details'=>'nullable',
            'external_links'=>'nullable',
            'application_details'=>'nullable',
            'pests_diseases_weeds_controlled'=>'nullable',
        ];
    }
}
