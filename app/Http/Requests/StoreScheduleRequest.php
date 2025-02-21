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
            'date' => 'required|date',
            'begin_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ];
    }


    public function messages(): array
    {
        return [
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'Le format de la date est incorrect.',
            'begin_time.required' => "L'horaire de début est obligatoire.",
            'begin_time.date_format' => "Le format de l'horaire de début est incorrect.",
            'end_time.required' => "L'horaire de fin est obligatoire.",
            'end_time.date_format' => "Le format de l'horaire de fin est incorrect.",
        ];
    }

}
