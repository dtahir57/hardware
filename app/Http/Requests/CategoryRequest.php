<?php

namespace Hardware\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                            'title' => 'required|max:255|unique:categories',
                            'description' => 'required',
                            'thumbnail' => 'required|image'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|max:255',
                        'description' => 'required',
                        'thumbnail' => 'required|image'
                    ];
                }
            default:
                return [];
        }
    }
}
