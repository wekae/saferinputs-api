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
            'pcpb_number'=> 'nullable',
            'manufacturer'=> 'nullable',
            'distributor'=>'nullable',
            'category'=>'nullable',
            'contact_details'=>'nullable',
            'image'=>'nullable',
            'external_links'=>'nullable',
            'application_details'=>'nullable',
            'pests_diseases_weeds'=>'nullable',
        ];
    }
}
