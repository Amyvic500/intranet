<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlStoreValidation extends FormRequest
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
		'lnkName' => 'required|max:255',
        'lnkUrl' => 'required',
		'lnkImg' => 'required|Image',
        ];
    }

	public function messages(){
		return[
		'lnkName.required'=>'Url name can not be empty',
		'lnkUrl.required'=>'Url address can not be empty',
		'lnkImg.required'=>'Url Image should be attached',
		'lnkImg.image'=>'File should be jpeg, png, bmp, gif, or svg extension',

		
		];
	}	
}
