<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Country extends UuidIdentifiedModel
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'code'
    ];
}
