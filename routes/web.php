<?php

// add your routes
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/iti", function () {
    return "iti";
});

Route::get("/hello",
    // closure  --> controller function
    function () {
        return "<h1 style='color: darkred; text-align: center'> Hello  </h1>";
    }
);



# route with required parameter
Route::get("/profile/{name}", function ($name) {

//    return $name;
    return "<h1 style='color: red; text-align: center'> Hello {$name} </h1>";
});


Route::get("/students", function () {
    $students = [
        ["id"=>1, "name"=>"John Doe", "email"=>"johndoe@email.com"],
        ["id"=>2, "name"=>"new user", "email"=>"user@email.com"],
        ["id"=>3, "name"=>"new student", "email"=>"student@email.com"],
    ];

    return $students;
})->name("students.index");


### get student profile
# url only integer






Route::get("/home", function () {
    return view('home');
});


// I need the controller function that will be applied when the url called

use App\Http\Controllers\StudentController;

Route::get("/students/home",[StudentController::class, "home"] )->name("students.home");

Route::get("/students/{id}", [StudentController::class, "show"] )
    ->where('id', '[0-9]+')
    ->name("students.show");


// add products routes
use App\Http\Controllers\ProductController;

Route::get("/products",[ProductController::class, "index"] )->name("products.index");
Route::get("/products/{id}", [ProductController::class, "show"] )
    ->name("products.show")->where('id', '[0-9]+');

Route::get("/products/{id}/delete", [ProductController::class, "destroy"] )->name("products.destroy");

Route::get("/products/create", [ProductController::class, "create"] )->name("products.create");
Route::post('/products', [ProductController::class, "store"] )->name("products.store");



















