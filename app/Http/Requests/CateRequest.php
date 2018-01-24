<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'keywords'=> "required", 
            'description'=> "required", 
            'title'=> "required"
        ];
    }
    public function messages(){
        return [
            'name.required'=> "Hãy nhập trường này",
            'keywords.required'=> "Hãy nhập trường này", 
            'description.required'=> "Hãy nhập trường này", 
            'title.required'=> "Hãy nhập trường này"
        ];
    }
}
