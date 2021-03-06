<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductionUpdateRequest extends FormRequest
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
            'title' => 'string|required',
            'address' => 'string|required',
            'description' => 'string|required',
            'phone1' => '',
            'phone2' => '',
            'email' => '',
            'latitude' => '',
            'longtitude' => '',
            'images' => '',
            'type' => 'required',
            'logo' => '',
            'tools' => '',
            'amount_production' => '',
            'brand' => '',
            'categories' => 'required',
            'price' => Rule::requiredIf(request('type') == 'product'),
            'currency' => Rule::requiredIf(request('type') == 'product'),
        ];
    }
}
