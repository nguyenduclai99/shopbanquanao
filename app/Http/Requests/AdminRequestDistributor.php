<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestDistributor extends FormRequest
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
            'd_name' => 'required|max:190|min:3|unique:distributor,d_name,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'd_name.required'   => 'Tên nhà phân phối không được để trống',
            'd_name.unique'     => 'Tên nhà phân phối đã tồn tại',
            'd_name.max'        => 'Tên nhà phân phối không quá 190 ký tự',
            'd_name.min'        => 'Tên nhà phân phối phải nhiều hơn 3 ký tự'
        ];
    }
}
