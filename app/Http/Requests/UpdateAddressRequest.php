<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'estado_edit' => 'required|string|max:100|min:1',
            'municipio_edit' => 'required|string|max:100|min:1',
            'cp_edit' => 'required|digits:5',
            'colonia_edit' => 'required|string|max:70|min:1|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\.\,\-]+$/',
            'calle_edit' => 'required|string|max:100|min:1|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\.\,\-]+$/',
            'num_ext_edit' => 'required|string|max:10|min:1|regex:/^[0-9A-Za-z\-\/]+$/',
            'num_int_edit' => 'nullable|string|max:10|min:1|regex:/^[0-9A-Za-z\-\/]+$/',
        ];
    }

    public function attributes()
    {
        return[
            'estado_edit' => 'estado',
            'municipio_edit' => 'municipio',
            'cp_edit' => 'código postal',
            'colonia_edit' => 'colonia',
            'calle_edit' => 'calle',
            'num_ext_edit' => 'número exterior',
            'num_int_edit' => 'número interior',
        ];
    }
}
