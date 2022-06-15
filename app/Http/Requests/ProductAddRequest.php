<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' =>'required',
            'brand_id' => 'required|max:255',
            'weight' => 'required|max:255',
            'contents' => 'required',
            'category_id' =>'required'
        ];
    }
    public function messages(){
        return [
        'name.required' => 'Vui lòng nhập tên sản phẩm',
        'name.unique' => 'Tên sản phẩm đã tồn tại!',
        'name.max' => 'Vui lòng nhập tên sản phẩm dưới 255 ký tự',
        'name.min' => 'Vui lòng nhập tên sản phẩm lớn hơn 5 ký tự',
        'price.required'  => 'Vui lòng nhập giá sản phẩm',
        'brand_id.required'  => 'Vui lòng chọn thương hiệu sản phẩm',
        'weight.required'  => 'Vui lòng nhập khối lượng sản phẩm',
        'contents.required'  => 'Vui lòng nhập mô tả sản phẩm',
        'category_id.required'  => 'Vui lòng chọn danh mục sản phẩm',
    ];
    }
}
