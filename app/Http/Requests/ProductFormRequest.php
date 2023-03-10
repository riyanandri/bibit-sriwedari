<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'slug' => 'required|string|max:255',
            'sentra_bibit' => 'required|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'quantity' => 'required|integer',
            'trending' => 'required',
            'status' => 'required',
            'meta_title' => 'required|string|max:255',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'image' => 'nullable|max:2048',
        ];
    }
}
