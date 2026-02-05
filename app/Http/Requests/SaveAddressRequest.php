<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAddressRequest extends FormRequest
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
            'calle' => 'required|string|max:100|min:1|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\.\,\-]+$/',
            'colonia' => 'required|string|max:70|min:1|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\.\,\-]+$/',
            'num_ext' => 'required|string|max:10|min:1|regex:/^[0-9A-Za-z\-\/]+$/',
            'num_int' => 'nullable|string|max:10|min:1|regex:/^[0-9A-Za-z\-\/]+$/',
            'municipio' => 'required|string|max:100|min:1',
            'estado' => 'required|string|max:100|min:1',
            'cp' => 'required|digits:5',
        ];
    }

    public function attributes()
    {
        return [
            'calle' => 'calle',
            'estado' => 'estado',
            'num_ext' => 'número exterior',
            'num_int' => 'número interior',
            'municipio' => 'municipio',
            'colonia' => 'colonia',
            'cp' => 'código postal',
        ];
    }
}
