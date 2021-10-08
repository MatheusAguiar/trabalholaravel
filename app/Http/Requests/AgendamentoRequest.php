<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoRequest extends FormRequest
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
            'data'=> 'bail|required',
            'horario'=> 'bail|required',
            'motivo'=> 'bail|required|min:3|max:100',
            'medico_id'=> 'bail|required|integer',
            'usuario_id'=> 'bail|required|integer',
            'clinica_id'=> 'bail|required|integer'
        ];
    }
    public function attributes(){
        return[
            'medico_id' => 'médico',
            'usuario_id' => 'paciente',
            'clinica_id' => 'clínica',
            'horario' => 'horário'
        ];
    }

}
