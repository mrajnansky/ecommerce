<?php

namespace App\Repository\Eloquent\ProductModule;

use App\Models\ProductModule\ProductCategory;
use App\Repository\Interfaces\ProductModule\ProductCategoryRepositoryInterface;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function all($conditions = [])
    {
        return ProductCategory::all();
    }

    public function get($id) : ?ProductCategory
    {
        return ProductCategory::find($id);
    }
}
