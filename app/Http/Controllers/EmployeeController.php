<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
