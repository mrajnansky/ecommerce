<?php

namespace App\Repository\Eloquent\ProductModule;

use App\Models\ProductModule\Product;
use App\Repository\Eloquent\ModelRepository;
use App\Repository\Interfaces\ProductModule\ProductRepositoryInterface;

class ProductRepository extends ModelRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}