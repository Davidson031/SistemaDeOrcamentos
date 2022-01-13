<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchDateOrcamento extends FormRequest
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
            'data_inicio' => 'required|date', 'data_fim' => 'required|date|after_or_equal:data_inicio'
        ];
    }

    public function messages() {
        return [
            'after_or_equal'=>'A data final tem que ser maior ou igual a data inicial',
        ];
    }
}
