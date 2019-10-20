<?php

namespace App\Http\Requests;

use App\Rules\ValidarCampoUrl;
use Illuminate\Foundation\Http\FormRequest;

class ValidacaoMenu extends FormRequest
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
            'nome' =>  'required|max:50|unique:menu,nome,' . $this->route('id'),
            'url' =>  ['required', 'max:100', new ValidarCampoUrl],
            'icone' =>  'nullable|max:50',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'nome.required' => 'O campo nome é obrigatório',
    //         'url.required' => 'O campo Url é obrigatório',
    //     ];
    // }
}
