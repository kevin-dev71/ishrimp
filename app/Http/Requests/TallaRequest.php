<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TallaRequest extends FormRequest
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
                return [
                    'name' => 'required|min:1',
                    'peso' => 'required|between:0,99999.999'
                ];
            }
            case 'PUT': {
                return [
                    'name' => 'required|min:1',
                    'peso' => 'required|between:0,99999.999'
                ];
            }
        }
    }
}
