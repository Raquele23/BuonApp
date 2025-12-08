<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
        $rules = [
            'mesa_id' => 'required|exists:mesas,id',

            'pratos' => 'required|array|min:1',
            'pratos.*' => 'required|exists:pratos,id',

            'quantidades' => 'required|array',

            'quantidades.*' => 'nullable|integer|min:0|max:60',

            'status' => 'nullable|string|max:255',
        ];

        $selecionados = $this->input('pratos', []);

        if (is_array($selecionados)) {
            foreach ($selecionados as $pratoId) {
                $rules["quantidades.$pratoId"] = 'required|integer|min:1|max:60';
            }
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'mesa_id.required' => 'Selecione uma mesa.',
            'mesa_id.exists' => 'A mesa selecionada não existe.',

            'pratos.required' => 'Escolha pelo menos um prato.',
            'pratos.*.exists' => 'Um dos pratos selecionados não existe.',

            'quantidades.array' => 'As quantidades devem ser enviadas em formato de lista.',
            'quantidades.*.max' => 'A quantidade máxima permitida por prato é 60.',
            'quantidades.*.required' => 'Informe a quantidade para o prato selecionado.',
            'quantidades.*.min' => 'Informe a quantidade para o prato selecionado.',
        ];
    }
}
