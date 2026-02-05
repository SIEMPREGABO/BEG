<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => 'required|email|regex:/^[\w\.\+-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|string|min:8|max:24',
        ];
    }

    public function attributes()
    {
        return[
            'email' => 'correo eletrónico',
            'password' => 'contraseña'
        ];
    }
}
