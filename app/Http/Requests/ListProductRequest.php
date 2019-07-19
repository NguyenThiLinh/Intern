<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListProductRequest extends FormRequest
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
            'name' => 'exists:products',
            'category_id' => 'integer|exists:categories,id',
            'price_min' => 'integer|min:0',
            'price_max' => 'integer|min:0',
            'per_page' => 'integer',
        ];
    }
}