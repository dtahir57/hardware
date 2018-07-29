<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductConditionRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                            'short_description' => 'required|max:255|unique:product_conditions',
                            'initials' => 'required|max:255',
                            'long_description' => 'required',
                            'warranty' => 'required|max:255',
                            'warranty_description' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'short_description' => 'required|max:255',
                        'initials' => 'required|max:255',
                        'long_description' => 'required',
                        'warranty' => 'required|max:255',
                        'warranty_description' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
