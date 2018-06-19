<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkingDayRequest extends FormRequest
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
            'day' => 'array|max:6',
            'day.0.working_day_id' => 'required|exists:working_days,index',
            'day.*.working_day_id' => 'nullable|required_with:day.*.start_at,day.*.end_at|exists:working_days,index|distinct',
            'day.*.start_at' => 'nullable|date_format:H:i',
            'day.*.end_at' => 'nullable|date_format:H:i',
        ];

    }

    public function messages()
    {
        return [
            'day.0.working_day_id.required' => 'The working day is required',
            'day.0.working_day_id.exists' => 'The working day must be a valid week day',
            'day.*.working_day_id.exists' => 'The working day must be a valid week day',
            'day.*.working_day_id.required_with' => 'The working day is required when time is scheduled',
            'day.*.working_day_id.distinct' => 'Duplicate value found for workng day',
            'day.*.start_at.date_format' => 'Invalid time format',
            'day.*.end_at.date_format' => 'Invalid time format',
        ];
    }
}
