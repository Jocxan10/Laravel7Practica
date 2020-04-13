<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->method()=='PUT'){

            $params = $this->route()->parameters();
            $id = $params['usuario'];

            return [
                'email' => 'string|required|email|max:191|unique:users,email,'.$id.',id',
                'nombre' => 'string|required|min:1|max:191',
                'telefono' =>'alpha_num|required|max:10',
            ];

        }else{

            return [
                'email' => 'string|required|email|max:255|unique:users,email',
                'nombre' => 'string|required|min:1|max:255',
                'telefono' =>'alpha_num|required|max:10',
            ];
        }
    }
}
