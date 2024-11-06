<?php

namespace App\Http\Requests\PersonnelRequest;

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
            'name' => 'required|string|max:22|min:6',
            'email' => 'required|string|max:225|min:10',
            'password' => 'required|string|max:225|min:4',
            'firstname' => 'required|string|max:22|min:6',
            'function' => 'required|string|max:22|min:6',
            'address'=> 'required|string|max:22|min:6',
            'sex'=> 'required|string|max:22|min:6',
            'phone'=> 'required|integer|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'le nom est requis',
            'name.min' => 'le nom dois avoir au manimum 6 caracteres',
            'name.max' => 'le nom dois avoir au maximum 22 caracteres',

            'email.required' => 'email est requis',
            'email.max' => 'email dois avoir au maximum 225 caracteres',
            'email.min' => 'email dois avoir au manimum 10 caracteres',

            'password.required' => 'password est requis',
            'password.max' => 'password dois avoir au maximum 225 caracteres',
            'password.min' => 'password dois avoir au manimum 4 caracteres',

            'firstname.required' => 'le prenom est requis',
            'firstname.min' => 'le prenom dois avoir au manimum 6 caracteres',
            'firstname.max' => 'le prenom dois avoir au maximum 22 caracteres',

            'function.required' => 'le poste est requis',
            'function.min' => 'le poste dois avoir au manimum 6 caracteres',
            'function.max' => 'le poste dois avoir au maximum 22 caracteres',

            'address.required' => 'l\'adresse est requis',
            'address.min' => 'l\'adresse dois avoir au manimum 6 caracteres',
            'address.max' => 'l\'adresse  dois avoir au maximum 22 caracteres',

            'sex.required' => 'le sexe est requis',
            'sex.min' => 'le sexe dois avoir au manimum 6 caracteres',
            'sex.max' => 'le sexe dois avoir au maximum 22 caracteres',

            'phone.required' => 'le numero telephone est requis',
            'phone.integer' => 'le numero telephone dois etre de type nombre',
            'phone.min' => 'le numero telephone dois avoir au manimum 6 caracteres',
            'phone.max' => 'le numero telephone dois avoir au maximum 10 caracteres'
        ];
    }
}
