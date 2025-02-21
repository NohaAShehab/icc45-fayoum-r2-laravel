<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    protected $fillable = [
        "name", "email", "salary", "image", "creator_id"
    ];

    function creator(){
        return $this->belongsTo(User::class);
    }
}
