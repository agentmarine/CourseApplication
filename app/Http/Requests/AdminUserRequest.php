<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserRequest extends Request
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
            //
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'role_id' => 'required',
            'is_Active' => 'required',
            'password' => 'required|min:6'
        ];
    }
}
