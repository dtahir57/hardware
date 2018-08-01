<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
                            'company_name' => 'required|max:255|unique:suppliers',
                            'company_address' => 'required',
                            'company_webpage' => 'required|max:255',
                            'first_name' => 'required|max:255',
                            'last_name' => 'required|max:255',
                            'phone_number' => 'required|max:255',
                            'email' => 'required|max:255',
                            'notes' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'company_name' => 'required|max:255',
                        'company_address' => 'required',
                        'company_webpage' => 'required|max:255',
                        'first_name' => 'required|max:255',
                        'last_name' => 'required|max:255',
                        'phone_number' => 'required|max:255',
                        'email' => 'required|max:255',
                        'notes' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
