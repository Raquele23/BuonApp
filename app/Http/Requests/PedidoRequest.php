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
        return [
            'mesa_id' => 'required|exists:mesas,id',
            'pratos' => 'required|array',
            'pratos.*' => 'exists:pratos,id',
            'quantidades' => 'required|array',
            'status' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'mesa_id.exists' => 'A mesa selecionada não existe.',

            'pratos.*.exists' => 'Um dos pratos selecionados não existe.',

            'quantidades.array' => 'As quantidades devem ser enviadas em formato de lista.',
        ];
    }
}
