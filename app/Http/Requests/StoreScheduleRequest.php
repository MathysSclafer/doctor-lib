<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required',
            'begin_time' => 'required',
            'end_time' => 'required',
        ];
    }

    public function messages(): array{
        return [
            'date.required' => 'Date is required',
            'date.date' => 'Date format is incorrect',
            'begin_time.required' => 'Begin time is required',
            'begin_time.time' => 'Begin time format is incorrect',
        ];
    }
}
