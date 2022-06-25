<?php

namespace App\Repository\Eloquent\ProductModule;

use App\Models\ProductModule\ProductCategory;
use App\Repository\Eloquent\ModelRepository;
use App\Repository\Interfaces\ProductModule\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends ModelRepository implements ProductCategoryRepositoryInterface
{
    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);
    }
}
