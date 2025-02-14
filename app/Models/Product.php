<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // you will use factories
    use HasFactory;

    // model have all properties related to the object
    // if you want product model --> represent table allproducts
    protected $table = 'products';

    # model --> define relations inside model ??
    # product has one category ??
    # any product from this model --> have one to many relationship
    # with category model
    # define relation
    function category(){
        # this product belongs to one category
        # select * from categories where id = product.category_id;
        return $this->belongsTo(Category::class);

    }
}
