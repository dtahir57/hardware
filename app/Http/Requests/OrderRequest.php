<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                            //
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'order_status' => 'required|max:255',
                        'shipping_status' => 'required',
                        'payment_status' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
