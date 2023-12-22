<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //valido para todo
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','max:100',Rule::unique('categories',column:'name')->ignore(id:request('category'),idColumn:'id')]
            // Rule::unique('categories',column:'name')->ignore(id:request('category'),idColumn:'id')] Es una regla, en cual solo acepta una categoria como unica
            // verificando que el nombre de la tabla categories siempre sea unico y obviando el id
        ];
    }

    public function message():array{
        //RECORDATORIO : TODAS LAS VALIDACIONES POR DEFECTO TIENEN MENSAJES DE ERROR
        // EJEMPLO: 'required' muestra " es necesario que ingrese un nombre
        //EJEMPLO" 'required' muestra que el dato ingresado debe ser de tipo texto
        // return [] devuelve un array
        // return {} devuelve un objeto
        return [
        'name.unique'=>__('La categoria  ya existe, utilize otra categoria.'),

        ];


    }
}
