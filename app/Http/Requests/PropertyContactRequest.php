<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:2', 'max:30'],
            'lastname' => ['required', 'string', 'min:2', 'max:30'],
            'email' => ['required', 'email', 'min:4', 'max:50'],
            'phone' => ['required', 'string', 'min:9', 'max:15'],
            'message' => ['required', 'string', 'min:10', 'max:255'],
        ];
    }
}
