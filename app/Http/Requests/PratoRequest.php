<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PratoRequest extends FormRequest
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
            'nome' => 'required|string|max:60',
            'descricao' => 'nullable|string|max:150',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }

    public function messages(): array
    {
        return [
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'descricao.max' => 'A descrição não pode ter mais de 150 caracteres.',

            'preco.required' => 'O preço do prato é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número válido.',

            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve estar no formato JPG, JPEG, PNG ou GIF.',
            'imagem.max' => 'A imagem não pode ser maior que 2MB.',

            'categoria_id.exists' => 'A categoria selecionada não existe.',
        ];
    }
}
