<?php

namespace App\Http\Requests\Candidate;

use App\Models\User;
use App\Models\UserProfile;
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
        return [
            'nid' => ['required', 'numeric', 'digits_between:10,17', Rule::unique(UserProfile::class)->ignore($this->user()->id)],
            'phone' => ['required', 'regex:/^([0-9\s\(\)\+\-\(\)]*)$/', 'min:10', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_2' => ['required', 'regex:/^([0-9\s\(\)\+\-\(\)]*)$/', 'min:10', 'max:20', 
            'unique:users,phone'],
            'website' => ['nullable', 'url', 'max:100'],
            'current_salary' => ['nullable', 'numeric'],
            'expected_salary' => ['nullable', 'numeric'],
            'father_name' => ['nullable', 'string', 'max:100'],
            'mother_name' => ['nullable', 'string', 'max:100'],
            'blood_group' => ['nullable', 'string', 'max:2'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required', 'string', 'max:255']
        ];
    }
}
