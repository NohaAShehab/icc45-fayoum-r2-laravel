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
//        dd(request()->all()); # return array of request content
        // use model ??? to get object id = $id ??

        # select * from products where id = $id;
        $color = request('color') ? request('color') : "blue";

        ## model --> function
        # $product = Product::find($id);
        $product = Product::findOrFail($id);
        # if product doesn't exist ?? -> return 404
        return view('products.show', compact('product', 'color'));

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
        // request() // return with request data
        // laravel provide  way to apply validation on post data ??
        request()->validate([
            "name" => ["required", "min:3", "max:255"],
            "price" => ["required", "min:1", "max:10000"],
            "description" =>"min:3|max:100"
        ]);

        // apply validation before save
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
        return to_route('products.show',$product->id);
    }

    function edit($id){
        # get object -->  display in form ??
        $product = Product::findOrfail($id);
        return view('products.edit', compact('product'));

    }

    function update($id){
        $product = Product::findOrFail($id);
        request()->validate([
            "name" => ["required", "min:3", "max:255"],
            "price" => ["required", "min:1", "max:10000"],
            "description" =>"min:3|max:100"
        ]);
        $name = request('name');
        $description = request('description');
        $price = request('price');
        $image = request('image');

        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->image = $image;
        $product->save();
        return to_route('products.show',$product->id);
    }


}
