<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //por defecto
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
        //restriccion a cosas en formulario create            
        return [
            'nombres' => 'required|string|min:3|max:50',
            'name' => 'required|alpha_dash|unique:users|min:3|max:20',
            'fechanacimiento' => 'required|date|after:1922-01-01|before:2004-12-31',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','confirmed','string','max:50',
                Password::min(6)->letters()->numbers()->uncompromised()], 
            //'contrasena_confirmation' => 'required|min:6|max:50',
        ];
    }
    public function messages(){
        //alterando los dialogos de error
        return [
            'required' => 'El campo :attribute es obligatorio',
            'string' => 'El campo :atribute debe ser un texto',
            'min' => 'El campo :attribute debe tener :min caracteres como minimo',
            'max' => 'El campo :attribute debe tener :max caracteres como minimo',
            'alpha-dash' => 'El nombre de usuario no es alfanumerico y no debe tener espacios',
            'unique' => 'El nombre de usuario ya esta en uso',
            'email' => 'El correo electronico es incorrecto',
            'date' => 'La fecha de nacimiento es incorrecta',
            'after' => 'La fecha de debe suceder despues del :date',
            'before' => 'La fecha debe suceder antes del :date',
            'confirmed' => 'La contraseña no coincide',
            'letters' => 'La contraseña debe tener minimo una letra',
            'numbers' => 'La contraseña debe tener minimo un numero',
            'uncompromised' => 'La contraseña es facil de adivinar'            
        ];
    }
}
