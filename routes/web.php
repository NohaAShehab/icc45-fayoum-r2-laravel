<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/student',[StudentController::class,'index'])->name("student.index");


# you need to create route for resouce controller --> StudentContoller
Route::resource('student', StudentController::class);
/*
 *   GET|HEAD        student ............................ student.index › StudentController@index
  POST            student ...............  ............ student.store › StudentController@store
  GET|HEAD        student/create ...................... student.create › StudentController@create
  GET|HEAD        student/{student} .................... student.show › StudentController@show
  PUT|PATCH       student/{student} .................... student.update › StudentController@update
  DELETE          student/{student} ..................... student.destroy › StudentController@destroy
  GET|HEAD        student/{student}/edit ................ student.edit › StudentController@edit
 *
 *
 *
 */
