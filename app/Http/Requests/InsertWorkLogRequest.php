<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertWorkLogRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_worklog'=>'required',
            'esercizio'=>'required',
            'serie'=>'required',
            'ripetizioni'=>'required',
            'sforzo'=>'required',
            'ums'=>'required'
        ];
    }
}
