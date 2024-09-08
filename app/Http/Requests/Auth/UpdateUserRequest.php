<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserRequest extends FormRequest
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
            'username'  => 'required|string|unique:users,username,'.$this->id,
            'email'     => 'required|email|unique:users,email,'.$this->id,
            'password'  => 'required|min:8',
            'status'    => 'required',
            'role'      => 'required',
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     $errors = $validator->errors(); // Here is your array of errors
    //     foreach ($errors as $error) {
    //         toastr()->error($error);
    //     }

    // }
}
