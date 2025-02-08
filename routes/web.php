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

});


### get student profile
# url only integer
Route::get("/students/{id}", function ($id) {
    $students = [
        ["id"=>1, "name"=>"John Doe", "email"=>"johndoe@email.com"],
        ["id"=>2, "name"=>"new user", "email"=>"user@email.com"],
        ["id"=>3, "name"=>"new student", "email"=>"student@email.com"],
    ];

    $filtered_student = array_filter($students, function($student) use ($id) {
        return $student["id"] == $id;
    });  # return with array --->
    if (count($filtered_student) > 0) {
//        var_dump($filtered_student);
        return current($filtered_student);   # first element in the array
    }

    return "<h1 style='color: red;'> No student found with id {$id} </h1>";
})->where('id', '[0-9]+');





Route::get("/home", function () {
    return view('home');
});


// I need to send data to the view from the controller

Route::get("/landing", function () {
    $students = $students = [
        ["id"=>1, "name"=>"John Doe", "email"=>"johndoe@email.com"],
        ["id"=>2, "name"=>"new user", "email"=>"user@email.com"],
        ["id"=>3, "name"=>"new student", "email"=>"student@email.com"],
    ];

   return view('land', ['students' => $students]);
});




















