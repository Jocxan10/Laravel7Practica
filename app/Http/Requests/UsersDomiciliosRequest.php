<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersDomiciliosRequest extends FormRequest
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
            $id = $params['usuario_domicilio'];

            return [
                'user_id' => 'numeric|required|max:191|unique:users_domicilios,user_id,'.$id.',id',
                'calle' => 'string|required|min:1|max:191',
                'colonia' =>'string|required|max:191',
                'cp'=> 'string|required|max:191',
            ];

        }else{

            return [
                'user_id' => 'numeric|required|max:191',
                'calle' => 'string|required|min:1|max:191',
                'colonia' =>'string|required|max:191',
                'cp'=> 'string|required|max:191',
            ];
        }
    }
}
