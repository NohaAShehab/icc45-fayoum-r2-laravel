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

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
            "password"=> "The provided password is incorrect."
        ]);
    }

//    return $user;
    // get number of current tokens per user??
    $number_of_tokens = $user->tokens->count();
//    return $number_of_tokens;
    if($number_of_tokens < 3){
        // if count < 3==> create token ??

        return $user->createToken($request->device_name)->plainTextToken;
    }

    throw ValidationException::withMessages([
        "message"=>"You have exceeded number of devices you are logging in.,please logout from one of them"
    ]);


});



/// use  token ???




/// logout =-> method post -->

// Take care that this route uses the authentication
Route::post("/logout_current", function(){
   $user = auth()->user(); // Auth --> provide auth ==> user()
//    return $user;
    $user->currentAccessToken()->delete();
    return response()->noContent();

})->middleware('auth:sanctum');




Route::post("/logoutFromAllDevices", function(){

    $user = auth()->user();
    $user->tokens()->delete();
    return response()->noContent();
})->middleware('auth:sanctum');
