<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'imagenStds' => 'required|image|dimensions:min_width=100,min_height=100',
            'textoStds' => 'required|string|max:500'
        ];
    }
    public function messages(){
        return [
            'imagenStds.required' => 'Añade una imagen',
            'textoStds.required' => 'Tienes que escribir un texto',
            'image' => 'Eso no es una imagen',
            'dimensions' => 'La imagen debe tener mas de 100 pixeles de ancho y alto',
            'string' => 'El texto tiene valores invalidos',
            'max' => 'El texto pasa de :max caracteres'
        ];
    }
}
