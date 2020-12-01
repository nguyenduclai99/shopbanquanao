<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email' => 'required|email|max:190|min:3|unique:users,email,'.$this->id,
            'name'=> 'required|max:190|min:3',
            'password'=> 'required|max:16|min:8',
            'phone'=> array(
                'required',
                'regex:/((09|03|07|08|05)+([0-9]{8}))\b/',
                'unique:users,phone'.$this->id
            )
        ];
    }

    public function messages()
    {
        return [
            'email.unique'     => 'Email đã tồn tại',
            'email.max'        => 'Email không quá 190 ký tự',
            'email.min'        => 'Email quá ít',
        ];
    }
}
