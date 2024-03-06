<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'salary_range' => ['required', 'string', 'max:100'],
            'expiration_date' => ['required', 'date'],
            'job_type' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:100'],
            'tags' => ['required', 'array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }
}
