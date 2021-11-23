<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendasFormRequest extends FormRequest
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
            'numero_vendas' => 'required',
            'cliente_id' => 'required',
            'produto_id' => 'required',
        ];
    }

    public function messages ()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
    }
}
