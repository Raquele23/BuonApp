<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MesaRequest extends FormRequest
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
        $mesaId = $this->route('mesa')?->id;

        return [
            'numero' => 'required|integer|unique:mesas,numero,' . $mesaId,
            'capacidade' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'numero.unique' => 'Já existe uma mesa com esse número.',
            'numero.integer' => 'O número da mesa deve ser um número inteiro.',

            'capacidade.min' => 'A capacidade mínima é 1 pessoa.',
        ];
    }
}
