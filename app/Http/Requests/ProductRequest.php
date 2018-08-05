<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                            'name' => 'required|max:255|unique:products',
                            'badge_id' => 'required',
                            'long_description' => 'required',
                            'product_condition_id' => 'required',
                            'manufacturer_id' => 'required',
                            'series' => 'required',
                            'unit_id' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|max:255',
                        'badge_id' => 'required',
                        'long_description' => 'required',
                        'product_condition_id' => 'required',
                        'manufacturer_id' => 'required',
                        'series' => 'required',
                        'unit_id' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
