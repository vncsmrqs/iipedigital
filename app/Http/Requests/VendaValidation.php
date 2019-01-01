<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaValidation extends FormRequest
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
            'cliente_id' => 'required|integer',
            'total_vendido' => 'required|numeric',
            'data_venda' => 'required|date_format:Y-m-d',
            'produtos' => 'required'
        ];
    }
}
