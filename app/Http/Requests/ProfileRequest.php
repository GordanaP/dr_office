<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumSpace;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => [
                'required_without_all:about,location',
                'nullable',
                'string',
                new AlphaNumSpace(),
                'max:30'
            ],
            'about' => 'required_without_all:name,location|nullable|string|max:150',
            'location' => 'required_without_all:name,about|nullable|string|max:50',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required_without_all' => 'Please fill up at least one field',
        ];
    }
}
