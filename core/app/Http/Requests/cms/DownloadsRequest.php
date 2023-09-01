<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class DownloadsRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',
            'url' => 'nullable',
            'file' => 'nullable',
            'entity_id' => 'nullable',
        ];
    }
}
