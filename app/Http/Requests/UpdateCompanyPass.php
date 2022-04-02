<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class UpdateCompanyPass extends FormRequest
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
            'old_pwd' => 'required|string|min:8',
            'new_pwd' => 'required|string|min:8|confirmed'
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $company = Company::where("id", $this->input('id'))->get();
            $company = $company[0];
            
            if (!(Hash::check($this->input('old_pwd'), $company->password))) {
                $validator->errors()->add('old_pwd', __('The current password is incorrect.'));
            }
        });
    }
}
