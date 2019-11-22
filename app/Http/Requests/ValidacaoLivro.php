<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoLivro extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|max:100',
            'isbn' => 'required|max:30|unique:livro,isbn,' . $this->route('id'),
            'autor' => 'required|max:100',
            'quantidade' => 'required|numeric',
            'editorial' => 'nullable|max:50',
            'foto_up' => 'nullable|image|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'isbn.unique' => 'Já existe um livro com esse ISBN',
            'foto_up.max' => 'A imagem não pode ser maior que 1MB'
        ];
    }
}
