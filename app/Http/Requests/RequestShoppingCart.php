<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestShoppingCart extends FormRequest
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
            'tst_email' => 'required|email|max:190|min:3',
            'tst_name'=> 'required|max:190|min:3',
            'tst_address'=> 'required|max:190|min:3',
            'tst_phone'=> array('required','regex:/((09|03|07|08|05)+([0-9]{8}))\b/')
        ];
    }

    public function messages()
    {
        return [
            'tst_email.unique'     => 'Email đã tồn tại',
            'tst_email.max'        => 'Email không quá 190 ký tự',
            'tst_email.min'        => 'Email quá ít',
            'tst_phone.regex'      => 'Số điện thoại không đúng định dạng'
        ];
    }
}
