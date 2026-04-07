<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Fill up the product model
    protected $fillable = [
        'name',
        'price'
    ];
}
