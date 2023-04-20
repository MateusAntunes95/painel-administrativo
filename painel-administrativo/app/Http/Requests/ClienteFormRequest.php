<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome_usuario' => 'required|regex:/^[a-zA-Z\s]*$/|not_regex:/[\.\-]/|unique:clientes,nome_usuario,' .$this->cliente->id,
            'email' => 'required|email|unique:clientes,email,' .$this->cliente->id,
            'nome_completo' => 'required|min:2',
            'cpf' => 'required|min:2|unique:clientes,cpf,' .$this->cliente->id,
            'rg' => 'required|min:2|unique:clientes,rg,' .$this->cliente->id,
            'nascimento' => 'required|min:10|max:10',
            'celular' => 'required|min:14|max:14',
         ]; 
    }
}
