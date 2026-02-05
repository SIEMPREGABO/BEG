<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'email' => 'required|email|unique:users|regex:/^[\w\.\+-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
            'celular' => 'required|string|unique:users|min:10|max:10',  //. $clienteId , excluye al editar
            'password' => 'required|string|min:8|confirmed|max:24|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ!@#$%^&*()_+\-=\[\]{};:",.<>\/?]+$/',
            
        ];
    }

    public function messages()
    {
        return[
            
        ];
    }

    public function attributes()
    {
        return[
            'nombre_pila' => 'nombre',
            'apellido_paterno' => 'apellido paterno',
            'apellido_materno' => 'apellido materno',
            'password' => 'contraseña',
            'celular' => 'celular',
            'email' => 'correo electrónico',
        ];
    }
}
