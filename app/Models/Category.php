<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    //

    # define relation --> category has many products ?
    function  products()
    {
        return $this->hasMany(Product::class);
    }
}
