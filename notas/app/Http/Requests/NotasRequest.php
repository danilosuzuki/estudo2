<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotasRequest extends FormRequest
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
            'title' => 'required|string|max:128',
            'message' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O campo título deve ser uma string.',
            'title.max' => 'O campo título não pode ter mais de :max caracteres.',
            'message.required' => 'O campo mensagem é obrigatório.',
            'message.string' => 'O campo mensagem deve ser uma string.',
        ];
    }
}
