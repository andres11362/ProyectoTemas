<?php

namespace prytemas\Http\Requests;

use prytemas\Http\Requests\Request;

class UserEditRequest extends Request
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
        $id = $this->route('usuarios');

        return [
            'username' => 'required|numeric|',
            'nombres'  => 'required',
            'email'    => 'required|email|unique:users,email,'.$id,
            'rol'      => 'required|min:5'
        ];
    }
}
