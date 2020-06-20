<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActiveIngredientsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'required',
            'potential_harm'=>'nullable',
            'aquatic'=>'nullable',
            'aquatic_desc'=>'nullable',
            'bees'=>'nullable',
            'bees_desc'=>'nullable',
            'earthworm'=>'nullable',
            'earthworm_desc'=>'nullable',
            'birds'=>'nullable',
            'birds_desc'=>'nullable',
            'leachability'=>'nullable',
            'leachability_desc'=>'nullable',
            'carcinogenicity'=>'nullable',
            'mutagenicity'=>'nullable',
            'edc'=>'nullable',
            'reproduction'=>'nullable',
            'ache'=>'nullable',
            'neurotoxicant'=>'nullable',
            'who_classification'=>'nullable',
            'eu_approved'=>'nullable',
        ];
    }
}
