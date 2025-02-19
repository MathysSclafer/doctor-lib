<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'time' => 'required',
            'doctor_id' => 'required',
            'type' => 'required'
        ];
    }

    public function messages(): array{
        return [
            'date.required' => 'The date field is required.',
            'time.required' => 'The time field is required.',
            'doctor_id.required' => 'The doctor field is required.',
            'type.required' => 'The type field is required.'
        ];
    }


}
