<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // you can add controller functions here
    function home() {
        $students = $students = [
            ["id"=>1, "name"=>"John Doe", "email"=>"johndoe@email.com"],
            ["id"=>2, "name"=>"new user", "email"=>"user@email.com"],
            ["id"=>3, "name"=>"new student", "email"=>"student@email.com"],
        ];

        return view('students.index', ['students' => $students]);
    }

    function show($id) {
        $students = [
        ["id"=>1, "name"=>"John Doe", "email"=>"johndoe@email.com"],
        ["id"=>2, "name"=>"new user", "email"=>"user@email.com"],
        ["id"=>3, "name"=>"new student", "email"=>"student@email.com"],
        ];

        $filtered_student = array_filter($students, function($student) use ($id) {
                return $student["id"] == $id;
            });
        if (count($filtered_student) > 0) {
            $student = reset($filtered_student);
            return view("students.show", compact("student"));
        }

        abort(404, "Student not found");
    }
    }
