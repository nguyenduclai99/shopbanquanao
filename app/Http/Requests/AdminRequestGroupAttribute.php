<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestGroupAttribute extends FormRequest
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
            'ga_name' => 'required|max:190|',
            'ga_category_id'=> 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'ga_name.required'   => 'Tên nhóm thuộc tính không được để trống',
            'ga_name.max'        => 'Tên nhóm thuộc tính không quá 190 ký tự',
        ];
    }
}
