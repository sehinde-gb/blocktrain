<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'present|string|unique:users',
            'email' => 'present|email|unique:users',
            'password' => 'present|string|min:6|max:10',
            'address' => 'present|string',
            'home_phone' => 'present|string',
            'mobile_phone' => 'present|string',
            'balance' => 'present|string'
        ];
    }
}