<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'=> "required", 
            'id_cate'=> "required",
            'preview'=> "required",
            'detail'=> "required",
            'title'=> "required",
            'keywords'=> "required",
            'description'=> "required",
            'tag'=> "required",
        ];
    }
    public function messages(){
        return [
            'name.required'=> "Hãy nhập trường này", 
            'id_cate.required'=> "Hãy nhập trường này",
            'preview.required'=> "Hãy nhập trường này",
            'detail.required'=> "Hãy nhập trường này",
            'title.required'=> "Hãy nhập trường này",
            'keywords.required'=> "Hãy nhập trường này",
            'description.required'=> "Hãy nhập trường này",
            'tag.required'=> "Hãy nhập trường này",
        ];
    }
}
