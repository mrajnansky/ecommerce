<?php

namespace App\Services\ProductModule;

use App\Models\ProductModule\ProductCategory;
use App\Repository\Interfaces\ProductModule\ProductCategoryRepositoryInterface;

class ProductCategoryService
{
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function index($params)
    {
        return $this->productCategoryRepository->all();
    }

    public function get($id)
    {
        return $this->productCategoryRepository->get($id);
    }

    public function make($fields)
    {
        $productCategory = new ProductCategory();
        $this->setValues($productCategory, $fields);
        return $this->productCategoryRepository->save($productCategory);
    }

    public function update($id, array $fields)
    {
        $productCategory = $this->productCategoryRepository->get($id);
        $this->setValues($productCategory, $fields);
        return $this->productCategoryRepository->save($productCategory);
    }

    public function delete($id)
    {
        $productCategory = $this->productCategoryRepository->get($id);
        return $this->productCategoryRepository->delete($productCategory);
    }

    private function setValues($productCategory, $fields){
        $productCategory->code = $fields['code'];
        $productCategory->name = $fields['name'];
        if(isset($fields['description'])){
            $productCategory->description = $fields['description'];
        }
        if(isset($fields['product_category_id'])) {
            $productCategory->product_category_id = $fields['product_category_id'];
        }else{
            $productCategory->product_category_id = null;
        }
        if(isset($fields['show'])) {
            $productCategory->show = $fields['show'];
        }else{
            $productCategory->show = 1;
        }
    }
}
