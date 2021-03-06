<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrcamento extends FormRequest
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
            'cliente' => 'required|alpha_dash',
            'vendedor' => 'required|alpha_dash',
            'descricao' => 'required',
            'valor' => 'required'
        ];
    }

    public function messages() {
        return [  'required' => 'O campo :attribute é obrigatório',
                  'alpha_dash' => 'O campo :attribute nao pode ter espaços em branco ou caracteres especiais',
                   ];
    }
}
