<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course',
        'course name',
        'description',
        
    ];
    public function students()
    {
        return $this->belongsToMany(student::class,'student_courses')
        ->using(StudentCourse::class)->withTimestamps();
    }
}
