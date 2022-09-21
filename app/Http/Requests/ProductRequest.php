<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            'product_name'      => ['required', Rule::unique('products')->ignore($this->product)],
            'product_stok'      => ['required', 'numeric'],
            'product_price'     => ['required', 'numeric'],
            'product_photo'     => ['image', 'max:10240']
        ];

        if ($this->method() == 'POST') {
            $rule['product_photo']      = ['required', 'image', 'max:10240'];
            $rule['product_name']       = ['required', Rule::unique('products')];
        }

        return $rule;
    }
}
