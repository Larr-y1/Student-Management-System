<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    //
    public function  Studenthomepage ()
    {
        return view('Studenthomepage');
    }
    public function Adminhomepage ()
    {
        $studentCount = student::count();
        $teacherCount = teacher::count();
        $courseCount = course::count();

        $recentStudents = student::latest()->take(4)->get();
        $recentTeachers =teacher::latest()->take(3)->get();

    return view('Adminhomepage', compact('studentCount', 'teacherCount', 'courseCount', 'recentStudents', 'recentTeachers'));
    }
}

