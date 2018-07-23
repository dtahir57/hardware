<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
                            'type' => 'required|max:255',
                            'label' => 'required|max:255',
                            'order' => 'required|max:255'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'type' => 'required|max:255',
                        'label' => 'required|max:255',
                        'order' => 'required|max:255'
                    ];
                }
            default:
                return [];
        }
    }
}
