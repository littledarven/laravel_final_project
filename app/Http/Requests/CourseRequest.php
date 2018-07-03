<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'string|required|min:5|max:30',
            'total_time' => 'numeric|required|max:3',
            'description' => 'min:10|max:300',
            'max_students'=> 'numeric|max:3|min:1',
        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'O nome só pode conter letras !',
            'name.max' => 'Minimo 5 máximo 30 caracteres !',
            'name.min' => 'Minimo 5 máximo 30 caracteres !',
            'total_time.numeric' => 'Somente números permitidos !',
            'total_time.max' => 'Máximo de 3 números !',
            'description.min' => 'Minimo 10 máximo 300 caracteres !'
            'description.max' => 'Minimo 10 máximo 300 caracteres !'
            'max_students.numeric' => 'Somente números permitidos !',
            'max_students.max' => 'Minimo 1 máximo 3 caracteres',
            'max_students.min' => 'Minimo 1 máximo 3 caracteres',

        ]
    }
}
