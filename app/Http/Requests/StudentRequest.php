<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules():array
    {
        //Khai báo mảng
        $rules=[];
        // Lấy phương thức đang hoạt động
        $method = $this->route()->getActionMethod();
        switch ($this->method()){
            case 'POST':
                switch ($method){
                    case 'add': // hàm nào gọi đến
                        $rules = [
                            'name' =>'required',
                            'gender' =>'required',
                            'phone' =>'required|unique:student',
                            'address' =>'required',
                            'image' =>'required'

                        ];
                        break;
                    case 'edit': // hàm nào gọi đến
                        $rules = [
                            'name' =>'required',
                            'gender' =>'required',
                            'phone' =>'required',
                            'address' =>'required'
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống tên',
            'gender.required'=>'Không được để trống giới tính',
            'phone.required'=>'Không được để trống số điện thoại',
            'phone.unique'=>'Số điện thoại này đã tồn tại',
            'address.required'=>'Không được để trống địa chỉ',
            'image.required'=>'Không được để trống hình ảnh'

        ];
    }
}
