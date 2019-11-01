<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RdvRequest extends FormRequest
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
            'raison' => 'required|max:25',
            'patient' => 'required|max:25',
        ];
    }
}