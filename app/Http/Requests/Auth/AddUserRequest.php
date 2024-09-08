<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'username'  => 'required|string|unique:users',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'role'      => 'required',
            'status'    => 'required',
        ];
    }
}
