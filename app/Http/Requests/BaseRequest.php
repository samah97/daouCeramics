<?php


namespace App\Http\Requests;


use App\Helpers\CustomLog;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        CustomLog::getInstance()->info('Validation Failed');
        if($this->ajax()){
            CustomLog::getInstance()->info('Is Ajax');
            $response = new JsonResponse([
                'success' => 'false',
                'errors' => $validator->errors(),
            ],403);
            throw new ValidationException($validator,$response);
        }else{
            CustomLog::getInstance()->info('parent failed');

            parent::failedValidation($validator);
        }
    }
}
