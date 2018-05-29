<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class PostProfile extends FormRequest
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
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:11',
            'add' => 'required|string|min:4|max:255',
            'password' => 'required|string|min:6|max:32|confirmed',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('auth.pl_name'),
            'password.required' => Lang::get('auth.pl_pass'),
            'phone.required' => Lang::get('auth.pl_phone'),
            'add.required' => Lang::get('auth.pl_add'),
        ];
    }
}
