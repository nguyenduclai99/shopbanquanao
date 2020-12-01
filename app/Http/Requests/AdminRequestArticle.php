<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestArticle extends FormRequest
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
            'a_name' => 'required|max:190|unique:articles,a_name,'.$this->id,
            'a_description'=> 'required',
            'a_menu_id'=> 'required',  
            'a_contents'=> 'required'          
        ];
    }

    public function messages()
    {
        return [
            'a_name.required'   => 'Tên bài viêt không được để trống',
            'a_name.unique'     => 'Tên bài viêt đã tồn tại',
            'a_name.max'        => 'Tên bài viêt không quá 190 ký tự',
        ];
    }
}
