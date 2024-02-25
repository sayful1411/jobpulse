<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialAccountRequest extends FormRequest
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
            'social_accounts' => ['nullable', 'array'],
            'social_accounts.*.title' => ['required', 'string', 'max:50'],
            'social_accounts.*.url' => ['sometimes', 'url'],
        ];
    }

    public function messages()
    {
        return [
            'social_accounts.*.url.url' => 'URL required.',
        ];
    }
}
