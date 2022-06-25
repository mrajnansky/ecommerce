<?php

namespace App\Services\ProductModule;

use App\Models\ProductModule\Product;
use App\Repository\Interfaces\ProductModule\ProductRepositoryInterface;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get($id)
    {
        return $this->productRepository->get($id);
    }

    public function make(array $fields)
    {
        $product = new Product();
        $this->setValues($product, $fields);
        $product = $this->productRepository->save($product);
        $this->associateOtherEntities($product, $fields);
        $product->refresh();
        return $product;
    }

    private function setValues(Product $product, array $fields)
    {
        $product->code = $fields['code'];
        $product->name = $fields['name'];
        $product->stock = $fields['stock'];
        $product->price = $fields['price'];
        $product->description = $fields['description'];
        $product->show = $fields['show'];
    }

    private function associateOtherEntities(Product $product, array $fields){
        if(isset($fields['product_categories'])){
            foreach ($fields['product_categories'] as $category){
                $product->productCategories()->attach($category['id']);
            }
        }
    }

    public function update($id, array $fields)
    {
        $product = $this->productRepository->get($id);
        $this->setValues($product, $fields);
        $product = $this->productRepository->save($product);
        $product->productCategories()->detach();
        $this->associateOtherEntities($product, $fields);
        $product->refresh();
        return $product;
    }

    public function delete($id)
    {
        $product = $this->productRepository->get($id);
        return $this->productRepository->delete($product);
    }
}