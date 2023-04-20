<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'nome' => 'required|min:2',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'required|min:2',
            'nascimento' => 'required|min:10|max:10',
            'celular' => 'required|min:14|max:14',
         ]; 
    }
}
