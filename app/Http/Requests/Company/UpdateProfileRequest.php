<?php

namespace App\Http\Requests\Company;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $companyId = $this->route('company')->id;

        return [
            'name' => [
                'required', 'string', 'max:100',
                Rule::unique('companies')->ignore($companyId),
            ],
            'phone' => [
                'required', 'regex:/^([0-9\s\(\)\+\-\(\)]*)$/', 'min:10',
                Rule::unique('companies')->ignore($companyId),
            ],
            'country' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'industry_type' => ['required', 'string', 'max:255'],
            'license_no' => ['nullable', 'string', 'max:255'],
            'website' => ['required', 'url', 'max:255'],
        ];
    }
}
