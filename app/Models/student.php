<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'contact',
        'email',
        'password',
        'DOB',
        'gender'
    ];

    public function courses()
    {
        return $this->belongsToMany(course::class,'student_courses')
        ->using(StudentCourse::class)->withTimestamps();
    }
}
