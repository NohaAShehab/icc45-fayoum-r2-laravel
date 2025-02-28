<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
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

Auth::routes();



/*
 *
 * GET|HEAD        home ........................................ home › HomeController@index
  GET|HEAD        login ........................... login › Auth\LoginController@showLoginForm
  POST            login ........................ Auth\LoginController@login
  POST            logout ........................ logout › Auth\LoginController@logout
  GET|HEAD        password/confirm ............ password.confirm › Auth\ConfirmPasswordController@showConfirmForm
  POST            password/confirm ....................................... Auth\ConfirmPasswordController@confirm
  POST            password/email .............. password.email › Auth\ForgotPasswordController@sendResetLinkEmail
  GET|HEAD        password/reset ........... password.request › Auth\ForgotPasswordController@showLinkRequestForm
  POST            password/reset ........................... password.update › Auth\ResetPasswordController@reset
  GET|HEAD        password/reset/{token} ............ password.reset › Auth\ResetPasswordController@showResetForm
  GET|HEAD        register .............. register › Auth\RegisterController@showRegistrationForm
  POST            register .................................... Auth\RegisterController@register
 *
 *
 * */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('employee', EmployeeController::class);

# only authenticated users can see this page ???
Route::get("/iti", function(){
    return "<h1> Hello </h1>";
})->middleware("auth");


Route::get("/data", function(){
    return "Hello";
});

//use App\Models\Employee;
//Route::get("/emp/{id}", function($id){
//    $employee = Employee::findOrfail($id);  # array of model objects
//
//    # laravel --> serialize the data automaically
//    #
//    return $employee;  ### serialization
//    # laravel --> return data in form of  array of json ??
//});
