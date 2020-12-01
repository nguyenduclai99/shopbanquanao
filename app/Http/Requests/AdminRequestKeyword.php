<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestKeyword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'k_name' => 'required|max:190|unique:keyword,k_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'k_name.required'   => 'Tên keyword không được để trống',
            'k_name.unique'     => 'Tên keyword đã tồn tại',
            'k_name.max'        => 'Tên keyword không quá 190 ký tự',
        ];
    }
}
