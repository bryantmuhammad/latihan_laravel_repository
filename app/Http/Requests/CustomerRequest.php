<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'customer_name'      => ['required', Rule::unique('customers')->ignore($this->customer)],
            'customer_phone'     => ['required', 'numeric'],
            'address'            => ['required']
        ];

        if ($this->method() == 'POST') $rule['customer_name']      = ['required', Rule::unique('customers')];

        return $rule;
    }
}
