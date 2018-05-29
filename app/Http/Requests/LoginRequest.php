<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class LoginRequest extends FormRequest
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
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('auth.pl_name'),
            'password.required' => Lang::get('auth.pl_pass')
        ];
    }
}
