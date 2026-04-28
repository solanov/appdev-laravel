<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','alpha'],
            'email' => ['required','email'],
            'password' => ['required','min:6','max:10']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Attention: Please Fill up the Username field to continue!',
            'name.alpha' => 'Attention: User name should contain letter only!',
            'email.required' => 'Attention: Please Fill up the Email field to continue!',
            'email.email' => 'Attention: Please use a valid email address to continue!',
            'password.required' => 'Attention: Please Fill up the Password field to continue!',
            'password.min' => 'Attention: Password must be at least 6 characters',
            'password.max' => 'Attention: Password must not exceed 10 characters'
        ];
    }
}
