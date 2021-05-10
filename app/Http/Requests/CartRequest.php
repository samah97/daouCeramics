<?php

namespace App\Http\Requests;

use App\Repositories\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class CartRequest extends FormRequest
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
        $productRepository = App::make('App\Repositories\ProductRepository');
        $product = $productRepository->getActiveById($this->id);
        return [
            'quantity'=>'required|integer|min:1|max:'.$product->quantity,
        ];
    }
}
