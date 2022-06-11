<?php

namespace App\Services\ProductModule;

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
}
