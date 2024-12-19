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
            'estado_edit' => 'required|string|max:255',
            'municipio_edit' => 'required|string|max:255',
            'cp_edit' => 'required|digits:5',
            'colonia_edit' => 'required|string|max:255',
            'calle_edit' => 'required|string|max:255',
            'num_ext_edit' => 'required|string|max:5',
            'num_int_edit' => 'nullable|string|max:5',
        ];
    }

    public function attributes()
    {
        return[
            'estado_edit' => 'estado',
            'municipio_edit' => 'municipio',
            'cp_edit' => 'cp',
            'colonia_edit' => 'colonia',
            'calle_edit' => 'calle',
            'num_ext_edit' => 'número exterior',
            'num_int_edit' => 'número interior',
        ];
    }
}
