<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

# use resource controller  --> by default laravel provide pre-built functions --> can be used ?
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::paginate(6);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->all());
        //
        $request->validate([
           "name" => "required|min:2",
           "email" => "required|email|unique:students",
           "grade" => "required|integer|min:0|max:100",
        ], // array contains validation rules ?
        [
            "name.required"=>"Student must have name",
            "name.min"=>"Student name must be at least 2 characters",
            "email.required"=>"Student must have email",
            "email.email"=>"Student email must be a valid email",
            "email.unique"=>"Student with this email already exists",
            "grade.required"=>"Student must have grade",
            "grade.min"=>"Student grade must be at least 0",
            "grade.max"=>"Student grade must be at Most 100",
        ] // error messages ??
        );
        $imagename = null;
        # if request has file --> save it ??
        if($request->hasFile('image')){
            $image = $request->file('image');
            ## create storage link ???
            # serving the files in storage folder --> link --> server
            $imagename=$image->store('', 'studentimage');
//            dd($imagename);


        }
        $request_data = $request->except(['image']);
        $request_data['image'] = $imagename;
//        dd($request_data);
        $student = Student::create($request_data);

        return to_route('student.index')->with('success', 'Student created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //

//        dd($student);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // I need to check if there is an image related to this object I need to delete it ??

        if (Storage::disk('studentimage')->exists($student->image)) {
            // ...
            Storage::disk("studentimage")->delete($student->image);
        }
        $student->delete();
        // display confirmation before delete
        return to_route('student.index')->with('success', 'Student deleted successfully');
    }
}
