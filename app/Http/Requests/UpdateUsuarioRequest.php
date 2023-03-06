<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUsuarioRequest extends FormRequest
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
            'nombres' => 'required|string|min:3|max:50',
            'fechaNacimiento' => 'required|date|after:1922-01-01|before:2004-12-31',
            'nicknameUsr' => 'required|alpha-dash|min:3|max:20', 
            'contrasena' => ['nullable','confirmed','max:50', 
                Password::min(6)->letters()->numbers()->uncompromised()],
        ];
    }
    public function messages(){
        return[
            'required'=>'El campo :attribute es obligatorio',
            'string' => 'El campo :atribute debe ser un texto',
            'min' => 'El campo :attribute debe tener :min caracteres como minimo',
            'max' => 'El campo :attribute debe tener :max caracteres como minimo',
            'date' => 'La fecha de nacimiento es incorrecta',
            'after' => 'La fecha de debe suceder despues del :date',
            'before' => 'La fecha debe suceder antes del :date',
            'alpha-dash' => 'El nombre de usuario no es alfanumerico y no debe tener espacios',
            'confirmed' => 'La contraseña no coincide',
            'letters' => 'La contraseña debe tener minimo una letra',
            'numbers' => 'La contraseña debe tener minimo un numero',
            'uncompromised' => 'La contraseña es facil de adivinar'
        ];
    }
}
