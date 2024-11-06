<?php

namespace App\Http\Requests\DirecteurRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoginDirecteurRequest extends FormRequest
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
            'email' => 'required|string|max:225|min:10',
            'password' => 'required|string|max:225|min:8'
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'email est requis',
            'email.max' => 'email dois avoir au maximum 225 caracteres',
            'email.min' => 'email dois avoir au manimum 10 caracteres',
            'password.required' => 'password est requis',
            'password.max' => 'password dois avoir au maximum 225 caracteres',
            'password.min' => 'password dois avoir au manimum 8 caracteres',
        ];
    }
}
