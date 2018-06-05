<?php

namespace App\Http\Requests\Auth;

use App\Rules\DifferentFromName;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $userId = $this->route()->parameter('userId') ?: \Auth::id();

        switch ($this->method())
        {
            case 'POST':
                return [
                    'role_id' => 'exists:roles,id',
                    'name' => 'required|string|alpha_num|max:30',
                    'email' => 'required|string|email|max:100|unique:users,email',
                    'password' => [
                        'required', 'string', 'min:6',
                        new DifferentFromName($this->name, $this->password),
                    ],
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'role_id' => 'exists:roles,id',
                    'name' => 'required|string|alpha_num|max:30',
                    'email' => 'required|string|email|max:100|unique:users,email,'.$userId,
                    'password' => [
                        'nullable',
                        'required_if:create_password,manual',
                        'string',
                        'min:6',
                        new DifferentFromName($this->name, $this->password),
                        'confirmed'
                    ],
                ];
                break;
        }
    }
}
