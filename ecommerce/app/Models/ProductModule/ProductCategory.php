<?php

namespace App\Models\ProductModule;

use App\Models\General\UuidIdentifiedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends UuidIdentifiedModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'code',
        'name',
        'product_category_id'
    ];

    protected $dates = ['deleted_at'];

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function products(){
        return $this->belongsToMany(
            Product::class,
            'products_product_categories',
            'product_category_id',
            'product_id'
        );
    }
}
