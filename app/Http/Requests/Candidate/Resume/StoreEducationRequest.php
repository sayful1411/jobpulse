<?php

namespace App\Http\Requests\Candidate\Resume;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'level' => ['required', 'string', 'max:50'],
            'degree_name' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'max:50'],
            'institute_name' => ['required', 'string', 'max:100'],
            'result' => ['required', 'string', 'max:50'],
            'passing_year' => ['required', 'numeric'],
        ];
    }
}
