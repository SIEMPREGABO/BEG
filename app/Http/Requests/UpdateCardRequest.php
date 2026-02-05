<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardRequest extends FormRequest
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
        // Usamos $this->input('card_id_hidden') para obtener el valor del campo oculto
        $cardId = $this->input('card_id_hidden');

        return [
            'num_tarjeta_edit' => 'required|string|unique:cards,num_tarjeta,' . $cardId . '|min:16|max:16',
            'owner_edit' => 'required|string|max:255',
            'mes_edit' => 'required|string|max:2|min:2',
            'anio_edit' => 'required|string|max:2|min:2',
            'cvv_edit' => 'required|string|max:4|min:3',
        ];
    }

    public function attributes()
    {
        return[
            'num_tarjeta_edit' => 'número de tarjeta',
            'owner_edit' => 'propietario',
            'mes_edit' => 'mes',
            'anio_edit' => 'año',
            'cvv_edit' => 'cvv',
        ];
    }
}
