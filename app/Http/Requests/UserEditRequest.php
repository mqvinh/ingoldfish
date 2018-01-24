<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'username' => "required|unique:users,username,".$this->id.",id",
            'password_confirmation' => 'same:password',
            'fullname' => 'required',
            'id_level' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(0)[0-9]{9}/'
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Hãy nhập tên đăng nhập',
            'fullname.required' => 'Hãy nhập trường này',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'password_confirmation.same' => 'Hãy nhập lại chính xác password',
            'id_level.required' => 'Hãy chọn cấp bậc',
            'email.required' => 'Email không được để trống',
            'email.email' =>'Hãy nhập đúng địa chỉ email',
            'phone.required' => 'Phone không được để trống',
            'phone.regex' => 'Hãy nhập phone'
        ];
    }
}
