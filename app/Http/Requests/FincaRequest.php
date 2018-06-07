<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FincaRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST': {
                $rules = [
                    'name' => 'required|min:1',
                    'piscinas' => 'required|between:0.001,999999.999',
                ];
                if(! is_null($this->piscinas))
                    foreach ($this->piscinas as $key => $val) {
                        $rules['piscinas.'.$key] = 'required';
                    }
                return $rules;
            }
            case 'PUT': {
                return [
                    'name' => 'required|min:5'
                ];
            }
        }
    }
}
