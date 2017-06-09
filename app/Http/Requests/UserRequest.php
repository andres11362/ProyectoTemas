<?php

namespace prytemas\Http\Requests;

use prytemas\Http\Requests\Request;

class UserRequest extends Request
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
            'username' => 'required|numeric|unique:users',
            'nombres'  => 'required',
            'email'    => 'required|email|unique:users',
            'rol'      => 'required|min:5'
        ];
    }
}
