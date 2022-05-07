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
            'name' => 'bail|required|unique:products|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'bail|required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm trùng với sản phẩm đã có',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
            'contents.required' => 'Nội dung sản phẩm không được để trống',
            'contents.min' => 'Nội dung sản phẩm không được dưới 5 ký tự',
        ];
    }
}
