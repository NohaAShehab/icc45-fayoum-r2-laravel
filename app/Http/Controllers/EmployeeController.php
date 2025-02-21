<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    function __construct(){
        $this->middleware('auth')->only(['store', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {

//        dd(Auth::id());
        $imagename = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename=$image->store('', 'employeesimages');
        }
        $request_data = $request->except(['image']);
        $request_data['image'] = $imagename;
        $request_data['creator_id'] = Auth::id();
        $employee = Employee::create($request_data);

        return to_route('employee.index')->with('success', 'Employee Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // if the current logged in user is the employee creator --> then he/she can edit
//        Gate::authorize('update-employee', $employee);

//        dd("You can update employee here");
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //

        dd($request->user(), $request);
            # request object contains information about current logged in user

        dd("update student");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {

        // use gate in the controller >??
        //
//        if (Storage::disk('employeesimages')->exists($employee->image)) {
//            // ...
//            Storage::disk("employeesimages")->delete($employee->image);
//        }
        $employee->delete();
        return to_route('employee.index')->with('success', 'Employee Deleted Successfully');
    }
}
