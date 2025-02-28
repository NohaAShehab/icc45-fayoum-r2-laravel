<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get("/test", function(){
    return "Hello";
});


// get all employees
//Route::get("/employee", function(){
//    $employees = Employee::all();  # array of model objects
//
//    # laravel --> serialize the data automaically
//    #
//    return $employees;  ### serialization
//    # laravel --> return data in form of  array of json ??
//});


//Route::get("/employee/{id}", function($id){
//    $employee = Employee::findOrfail($id);  # array of model objects
//
//    # laravel --> serialize the data automaically
//    #
//    return $employee;  ### serialization
//    # laravel --> return data in form of  array of json ??
//});



/// authenication methods differents
///  middlewares --> web.php


// in api.php --> I need to apply different middlewares
use App\Http\Controllers\Api\EmployeeController;

Route::apiResource("/employee", EmployeeController::class );

/*
 *  GET|HEAD        api/employee .................................... employee.index › Api\EmployeeController@index
  POST            api/employee .................................... employee.store › Api\EmployeeController@store
  GET|HEAD        api/employee/{employee} ........................... employee.show › Api\EmployeeController@show
  PUT|PATCH       api/employee/{employee} ....................... employee.update › Api\EmployeeController@update
  DELETE          api/employee/{employee} ..................... employee.destroy › Api\EmployeeController@destroy

 */
