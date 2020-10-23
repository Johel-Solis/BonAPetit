<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrincipleRequest extends FormRequest
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
           
            'name'=>'required|min:1|max:60|unique:principles,name',

        ];

    }
    public function messages()
    {
        return [
            
            'name.required'=>'El campo Nombre es obligatorio',
            'name.regex'=>'El campo Nombre solo debe tener letras',
            'name.min'=>'El campo Nombre deber tener al menos un caracter',
            'name.max'=>'El campo Nombre no deber tener más de 60 caracteres',
            'name.unique'=>'El nombre digitado ya existe',

        ];
    }
}
