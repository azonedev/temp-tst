<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => ['required','string', 'min:5', 'max:100'],
            'email' => ['required', 'email','min:5', 'max:100'],
            'phone' => ['required', 'string', 'min:11', 'max:20'],
            'vaccine_center_id' => ['required'],
            'nid' => ['required','numeric', 'max_digits:20', 'unique:users,nid'],
        ];
    }

    public function messages(): array
    {
        return [
            'nid.unique' => 'This NID is already registered',
        ];
    }
}
