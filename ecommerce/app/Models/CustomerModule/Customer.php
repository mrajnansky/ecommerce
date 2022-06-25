<?php

namespace App\Models\CustomerModule;

use App\Models\General\UuidIdentifiedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends UuidIdentifiedModel
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'address',
        'country_id',
    ];
}
