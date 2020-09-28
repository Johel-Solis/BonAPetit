<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlateRequest extends FormRequest
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
           
            'name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:20|unique:plates,name',
            'description'=>'required|min:10|string',
            'precio'=>'required|integer|min:0',
            'photo'=>'required|image|mimes:jpg,jpeg,png'

        ];

    }
    public function messages()
    {
        return [
            
            'name.required'=>'El campo Nombre es obligatorio',
            'name.regex'=>'El campo Nombre solo debe tener letras',
            'name.min'=>'El campo Nombre deber tener al menos un caracter',
            'name.max'=>'El campo Nombre no deber tener más de 20 caracteres',
            'name.unique'=>'El nombre digitado ya existe',
            'photo.required'=> 'Debe cargar una foto',
            'photo.imae'=>'El archivo debe ser una imagen',
            'photo.mimes'=>'El archivo debe tener extension jpg,jpeg o png',
            'description.required'=>'El campo Descripción es obligatorio',
            'description.min'=>'El campo descripcion debe tener al menos 10 caracteres',
            'precio.required'=>'El campo precio es obligatorio',
            'precio.integer'=>'El campo precio solo debe contener numeros',
            'precio.min'=>'El precio no puede ser menor a $0',

        ];
    }
}
