<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCardRequest extends FormRequest
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
            'num_tarjeta' => 'required|string|unique:cards|min:15|max:16',
            'owner' => 'required|string|max:255',
            'mes' => 'required|string|max:2|min:2',
            //'fvc' => 'required|date',
            'anio' => 'required|string|max:2|min:2',
            'cvv' => 'required|string|max:4|min:3',
        ];
    }

    public function attributes()
    {
        return[
            'num_tarjeta' => 'número de tarjeta',
            'owner' => 'propietario',
            'mes' => 'mes',
            'anio' => 'año',
            //'''fcv' => 'datetime:mm/YY',
            //'fvc' => 'fecha de vencimiento',
            'cvv' => 'cvv',
        ];
    }
    /*
    public function casts(){
        return[
            'fvc' => 'datetime:mm/YY',
        ];
    }*/
}
