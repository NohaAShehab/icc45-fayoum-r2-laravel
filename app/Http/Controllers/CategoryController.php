<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    function  index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    function show($id){
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }
}
