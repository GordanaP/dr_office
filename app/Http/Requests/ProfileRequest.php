<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumSpace;
use App\Services\Utilities\ProfileTitles;
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
            'title' => 'sometimes|required|in:'.ProfileTitles::getArray(),
            'first_name' => 'sometimes|required|string|alpha_num|max:30', //the field may be absent from the form(sometimes)
            'last_name' => 'sometimes|required|string|alpha_num|max:30', //the field may be absent from the form(sometimes),
            'education' => 'sometimes|required|max:300'
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
