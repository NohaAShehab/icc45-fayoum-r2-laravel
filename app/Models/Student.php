<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // by default  --> represent table students
    #  if you are using Student::create([]) to create object ---> only the parameter added in
    # the fillable property will be passed to the objects.
    protected $fillable = ["name", "email", "grade", "image"];
}
