<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripeRequest extends FormRequest
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
                            'fname' => 'required|max:255',
                            'lname' => 'required|max:255',
                            'email' => 'required|max:255',
                            'phone_number' => 'required|max:255',
                            'company' => 'required|max:255',
                            'country' => 'required|max:255',
                            'city' => 'required|max:255',
                            'zip' => 'required|max:255',
                            'address1' => 'required|max:255',
                            'number' => 'required',
                            'name' => 'required',
                            'exp_month' => 'required',
                            'exp_year' => 'required',
                            'cvc' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|max:255'
                    ];
                }
            default:
                return [];
        }
    }
}
