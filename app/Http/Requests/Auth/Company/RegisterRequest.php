<?php

namespace App\Http\Requests\Auth\Company;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'unique:companies,name'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:companies,email'],
            'phone' => ['required', 'regex:/^([0-9\s\(\)\+\-\(\)]*)$/', 'min:10', 'unique:companies,phone'],
            'password' => ['required', 'confirmed', Password::defaults() ],
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
