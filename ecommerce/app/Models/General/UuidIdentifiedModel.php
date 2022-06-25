<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UuidIdentifiedModel extends Model
{
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
