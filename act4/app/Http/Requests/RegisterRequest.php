<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'middle_initial' => ['nullable', 'alpha', 'size:1'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'contact_number' => ['required', 'numeric', 'digits:11', 'starts_with:09'],
            'college' => ['required'],
            'program' => ['required'],
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'Attention: First Name is required.',
            'first_name.alpha' => 'Attention: First Name must contain letters only.',
            'last_name.required' => 'Attention: Last Name is required.',
            'last_name.alpha' => 'Attention: Last Name must contain letters only.',
            'middle_initial.alpha' => 'Attention: Middle Initial must be a letter.',
            'middle_initial.size' => 'Attention: Middle Initial must be exactly 1 character.',
            'email.required' => 'Attention: Email address is required.',
            'email.email' => 'Attention: Please provide a valid email address.',
            'password.required' => 'Attention: Password is required.',
            'password.min' => 'Attention: Password must be at least 6 characters.',
            'password_confirmation.required' => 'Attention: Please confirm your password.',
            'password_confirmation.same' => 'Attention: Passwords do not match.',
            'contact_number.required' => 'Attention: Contact Number is required.',
            'contact_number.numeric' => 'Attention: Contact Number must contain numbers only.',
            'contact_number.digits' => 'Attention: Contact Number must be exactly 11 digits.',
            'contact_number.starts_with' => 'Attention: Contact Number must start with "09".',
            'college.required' => 'Attention: Please specify your College.',
            'program.required' => 'Attention: Please specify your Program.',
        ];
    }
}
