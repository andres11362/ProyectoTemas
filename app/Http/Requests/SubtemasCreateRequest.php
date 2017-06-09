<?php

namespace prytemas\Http\Requests;

use prytemas\Http\Requests\Request;

class SubtemasCreateRequest extends Request
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
            'titulo' => 'required',
            'texto'  => 'required',
			'imagen' => 'required|image|max:20000',
        ];
    }
}
