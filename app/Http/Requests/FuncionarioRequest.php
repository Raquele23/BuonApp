<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'nome' => 'required|string|max:50|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/',
            'email' => 'required|email:rfc,dns|max:100',
            'telefone' => 'required|string|max:20|regex:/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/',
            'cargo' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome.regex' => 'O nome deve conter apenas letras e espaços.',
            'email.dns' => 'O domínio deste e-mail não existe. Verifique e tente novamente.',
            'telefone.regex' => 'Informe um número de telefone válido com DDD.',
        ];
    }
}
