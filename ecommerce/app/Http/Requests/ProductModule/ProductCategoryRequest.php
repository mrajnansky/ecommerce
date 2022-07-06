<?php

namespace App\Http\Requests\ProductModule;

use App\Repository\Interfaces\ProductModule\ProductCategoryRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        if(
            ($this->route('category', false)) &&
            !$productCategoryRepository->get($this->route('category'))
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
                'code' => 'required|min:3|max:255' . ($this->isMethod('POST') ? '|unique:product_categories,code' : ''),
                'name' => 'required|min:3|max:255',
                'description' => 'sometimes|max:500',
                'product_category_id' => 'sometimes|exists:product_categories,id',
                'show' => 'sometimes|boolean',
            ];
        }
        return [
            //
        ];
    }
}
