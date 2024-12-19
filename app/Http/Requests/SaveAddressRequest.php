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
            'calle' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'num_ext' => 'required|string|max:5',
            'num_int' => 'nullable|string|max:5',
            'municipio' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'cp' => 'required|digits:5',
        ];
    }

    public function attributes()
    {
        return[
            'num_ext' => 'número exterior',
            'num_int' => 'número interior'
        ];
    }
}
