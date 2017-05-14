<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoPost extends FormRequest
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
            'photoTitle' => 'required|string',
            'photoURL' => 'required|string',
            'photoDesc' => 'required|string'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'photoTitle.required' => '標題為必填',
            'photoURL.required' => '圖片網址為必填',
            'photoDesc.required' => '內容為必填'
        ];
    }
}
