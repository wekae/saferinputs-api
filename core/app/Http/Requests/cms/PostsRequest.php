<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'content' => 'nullable',
            'summary' => 'nullable',
            'standalone' => 'nullable',
            'tags' => 'nullable',
            'status' => 'nullable',
            'entity_id' => 'nullable',
            'user_id' => 'nullable',
            'image' => 'nullable',
        ];
    }
}
