<?php

namespace App\Http\Requests\TypeRequest;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => 'required|string|min:4',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'le nom est requis',
            'name.max' => 'le nom doit avoir au maximum 23 caracteres',
            'name.min' => 'le nom doit avoir au minimum 4 caracteres',
            'description.required' => 'la description est requis'
        ];
    }
}
