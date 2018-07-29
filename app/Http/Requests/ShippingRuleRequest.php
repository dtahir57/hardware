<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRuleRequest extends FormRequest
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
                            'name' => 'required|max:255|unique:shipping_rules',
                            'priority' => 'required|max:255',
                            'country' => 'required',
                            'shipping_provider' => 'required|max:255',
                            'shipping_features' => 'required',
                            'minimum_order_total' => 'required|integer',
                            'description' => 'required',
                            'thumbnail' => 'required|image'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|max:255',
                        'priority' => 'required|max:255',
                        'country' => 'required',
                        'shipping_provider' => 'required|max:255',
                        'shipping_features' => 'required',
                        'minimum_order_total' => 'required|integer',
                        'description' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
