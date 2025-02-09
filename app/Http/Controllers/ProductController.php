<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    function index(){

        // I need to get all products from the database
        $products = Product::all(); # array of model object --->
//        return $products;
//        return  view('products.index', compact('products'));
        return view('products.index', ['products' => $products]);
    }

    function show($id)
    {
        // use model ??? to get object id = $id ??

        # select * from products where id = $id;

        ## model --> function
        # $product = Product::find($id);
        $product = Product::findOrFail($id);
        # if product doesn't exist ?? -> return 404
        return view('products.show', compact('product'));

    }

    function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
//        return "deleted";
        return to_route('products.index');

    }
}
