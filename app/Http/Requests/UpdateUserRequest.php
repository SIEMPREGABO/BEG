<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class UpdateUserRequest extends FormRequest
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
            'nombre_pila' => 'required|string|min:3|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóú\s]+$/',
            'apellido_paterno' => 'required|string|min:3|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóú\s]+$/',
            'apellido_materno' => 'required|string|min:3|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóú\s]+$/',
            'celular' => 'required|string|unique:users,celular,' . Auth::id() . '|min:10|max:10|regex:/^[0-9]+$/',
            'password' => 'nullable|string|min:8|confirmed|max:24|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ!@#$%^&*()_+\-=\[\]{};:",.<>\/?]+$/',
            'current_password' => 'nullable|required_with:password|min:8|max:24|string|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ!@#$%^&*()_+\-=\[\]{};:",.<>\/?]+$/',
        ];
    }

    public function attributes()
    {
        return[
            'nombre_pila' => 'nombre',
            'apellido_paterno' => 'apellido paterno',
            'apellido_materno' => 'apellido materno',
            'celular' => 'celular',
            'password' => 'contraseña',
            'current_password' => 'contraseña actual',
        ];
    }
}
