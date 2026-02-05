<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
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
            'code' => 'required|string|unique:codes|min:4|max:16',
            //'caducidad' => 'required|date|nullable',
            'active' => 'required|boolean',
        ];
    }


    public function attributes()
    {
        return[
            'codigo' => 'Nombre',
            'caducidad' => 'Fecha de caducidad',
            'habilitar' => 'Habilita o deshabilita el código',
        ];
    }
}
