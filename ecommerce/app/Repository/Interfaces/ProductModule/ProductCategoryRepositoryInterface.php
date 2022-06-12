<?php

namespace App\Repository\Interfaces\ProductModule;

use App\Models\ProductModule\ProductCategory;

interface ProductCategoryRepositoryInterface
{
    public function get($id) : ?ProductCategory;
}
