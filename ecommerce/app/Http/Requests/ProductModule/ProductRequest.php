<?php

namespace App\Http\Requests\ProductModule;

use App\Repository\Interfaces\ProductModule\ProductRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(ProductRepositoryInterface $productRepository)
    {
        if(
            ($this->route('product', false)) &&
            !$productRepository->get($this->route('product'))
        ){
            abort(404);
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('POST') || $this->isMethod('PUT')){
            return [
                'code' => 'required|min:3|max:255' . ($this->isMethod('POST') ? '|unique:products,code' : ''),
                'name' => 'required|min:3|max:255',
                'stock' => 'sometimes|integer|min:0',
                'price' => 'numeric|min:0',
                'description' => 'sometimes|max:500',
                'show' => 'sometimes|boolean',
                'product_categories' => 'sometimes',
                'product_categories.*.id' => 'required_with:product_categories|exists:product_categories,id',
            ];
        }

        return [
            //
        ];
    }
}
