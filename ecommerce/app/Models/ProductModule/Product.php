<?php

namespace App\Models\ProductModule;

use App\Models\General\UuidIdentifiedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends UuidIdentifiedModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'stock',
        'price',
        'description',
        'show',
    ];

    protected $dates = ['deleted_at'];

    public function productCategories(){
        return $this->belongsToMany(
            ProductCategory::class,
            'products_product_categories',
            'product_id',
            'product_category_id'
        );
    }
}
