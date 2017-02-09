<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStore extends FormRequest
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
            'category_id' =>'required',
            'product_name' =>'required',
            'quantity' =>'required',
            'price' =>'required',
            'unit' =>'required',
            'image' =>'required',
            'Active' =>'required',




        ];
    }
}
