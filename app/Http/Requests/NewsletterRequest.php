<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NewsletterRequest extends BaseRequest
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
            'email'=>['required','email','unique:newsletters']
        ];
    }

    public function messages()
    {
        return [
            'email.unique' =>__('titles.already_subscribed')
        ];
        //return parent::messages();
    }

    public function failedValidation(Validator $validator)
    {
        Alert::error('', __($validator->errors()->all()[0]));
        parent::failedValidation($validator);
    }
}
