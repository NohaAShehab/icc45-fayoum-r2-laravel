<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // you will use factories
    use HasFactory;

    // if you want product model --> represent table allproducts
    protected $table = 'products';
}
