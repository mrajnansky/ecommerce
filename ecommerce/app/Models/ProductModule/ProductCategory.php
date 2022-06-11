<?php

namespace App\Models\ProductModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ProductCategory extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model){
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}
