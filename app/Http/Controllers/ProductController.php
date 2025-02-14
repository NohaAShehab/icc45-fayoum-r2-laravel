<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    function index(){

//        $products = Product::all(); # array of model object --->
        $products = Product::paginate(6);

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

    function create(){
        return view('products.create');
    }
    function store()
    {
        // I need to see the request data
//        dd($_POST); # print variable then exit ;
        # laravel  ==> request()
//        dd(request());
        $name = request('name');
        $description = request('description');
        $price = request('price');
        $image = request('image');
//        dd($name, $description, $price, $image);
        # create product object then save it in the db
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->image = $image;
        $product->save();
//        dd($product);
        return to_route('products.show',$product->id);
//        return 'Product received';
    }
}
