<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Auth;

# Api resource controller  --> exclude edit , create function
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    public function index()
    {

//        dd(Auth::user());
//        return Auth::user();
        //
//        return Employee::all();
//        return response()->json(Employee::all())->setStatusCode(200);

//        $data = ["data" => Employee::all()];
//        return response()->json($data);

        ### use  API resources
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
    public function store(StoreEmployeeRequest $request)
    {

        $imagename= null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename=$image->store('', 'employeesimages');
        }
        $request_data = $request->except(['image']);
        $request_data['image'] = $imagename;
        $request_data['creator_id'] = Auth::id();
        // 1- show request details
//         return $request->all();

        $employee = Employee::create($request_data);
//        return $employee;
//        return response()->json($employee)->setStatusCode(201)->header('Content-Type', 'application/json');
        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //

//        return $employee;
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $employee->update($request->all());
//        return $employee;
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
//        return "deleted";
        return response()->json(null, 204);
//        return new EmployeeResource($employee);
    }
}
