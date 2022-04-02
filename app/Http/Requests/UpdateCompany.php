<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
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
            'name' => 'required',
            'president' => 'required',
            'year' => 'required|numeric|between:1000,9999',
            'month' => 'required|numeric|between:1,12',
            'day' => 'required|numeric|between:1,31',
            'email' => 'required|email:rfc,dns',
        ];
    }
}
