<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'pro_name' => 'required|max:190|unique:products,pro_name,'.$this->id,
            'pro_price'=> 'required',
            'pro_description'=> 'required',
            'pro_category_id'=> 'required',
            'pro_sale'=> 'required',
            'pro_sale'=>  'numeric|min:0|max:100',
            'pro_price'=> 'required',
            'pro_quantity'=> 'required',
            'pro_distributor_id'=> 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required'   => 'Tên sản phẩm không được để trống',
            'pro_name.unique'     => 'Tên sản phẩm đã tồn tại',
            'pro_name.max'        => 'Tên sản phẩm không quá 190 ký tự',
            'pro_sale.numeric'    => 'Phần trăm giảm giá không được quá 100 hoặc nhỏ hơn 0',
        ];
    }
}
