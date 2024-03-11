<?php

namespace App\Http\Requests\Candidate\Resume;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:100'],
            'department' => ['required', 'string', 'max:100'],
            'join' => ['required', 'date'],
            'resign' => ['nullable', 'date'],
            'is_currently_working' => ['nullable', 'boolean'],
            'company_address' => ['required', 'string', 'max:255'],
            'responsibilities' => ['required', 'string'],
        ];
    }
}
