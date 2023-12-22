<?php

namespace App\Http\Controllers;
use App\Models\student;
use App\Models\user;
use App\Models\application;
use App\Models\course;
use App\Models\StudentCourse;
use App\Models\teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   
    //
    public function ViewApplications()
    {
        $data=  application::all();
        return view('Applications.view')->with('data', $data);
    }
    public function ViewUsers()
    {
        $data= user::all();
        return view('users.Viewusers')->with('data', $data);
    }
    
    public function ShowAddUsers($id)
    {
        $item = application::find($id);
        return view('users.Addusers', compact('item')); 

    }
    public function StoreUsers(Request $request)
    {
     
     $username = $request->input('username');
     $phone = $request->input('phone');
     $email = $request->input('email');
     $password = bcrypt($request->input('password'));

              //creating newuser
        
              $user = new user();
              $user->username = $username;
              $user->phone = $phone;
              $user->email = $email;
              $user->password = $password;

              $user->save();

       session()->flash('success','User added successfully');
       

       return Redirect('/users/View');
    }
    public function Userupdate( Request $request, $id)
    {
        $item = user::find($id);
        $item->update($request->all());
        return redirect()->route('user.view')->with('success', 'User details updated successfully!');
        
    }
    public function UserDelete($id)
    {
        $item = user::find($id);

        if(!$item)
        {
            return redirect()->route('user.view')->with('error', 'user not found');
        }

        $item->delete();

        return redirect()->route('user.view')->with('good', 'user deleted successfully');
    }
   
    public function ViewStudents()
    {
        $data = student::all();
        return view('students.viewstudents')->with('data', $data);
    }
    public function ShowAddStudents($id)
    {
        $item = application::find($id);
        return view('students.Addstudents', compact('item')); 

    }
    public function StoreStudents(Request $request)
    {
     
     $firstname = $request->input('firstname');
     $lastname = $request->input('lastname');
     $contact = $request->input('contact');
     $email = $request->input('email');
     $password = $request->input('password');
     $DOB = $request->input('DOB');
     $gender = $request->input('gender');
     
              //creating newstudent
        
              $student = new student();
              $student->firstname = $firstname;
              $student->lastname = $lastname;
              $student->contact = $contact;
              $student->email = $email;
              $student->password = $password;
              $student->DOB = $DOB;
              $student->gender = $gender;

              $student->save();

       session()->flash('succes','Student added successfully');
       

       return Redirect('/student/views/');
    }
    public function Studentupdate( Request $request, $id)
    {
        $item = student::find($id);
        $item->update($request->all());
        return redirect()->route('students.view')->with('success', 'Student details updated successfully!');
        
    }
    public function StudentDelete($id)
    {
        $item = student::find($id);

        if(!$item)
        {
            return redirect()->route('students.view')->with('error', 'student not found');
        }

        $item->delete();

        return redirect()->route('students.view')->with('success', 'student deleted successfully');
    }
    public function ViewTeachers()
    {
        $data = teacher::all();
        return view('teachers.viewteachers')->with('data', $data);
    }
    public function ShowAddteacher()
    {
        return view('teachers.Addteacher');
    }
    public function StoreTeachers( Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',

        ]);
        $teacher = new teacher();
        $teacher->firstname = $request->input('firstname');
        $teacher->lastname = $request->input('lastname');
        $teacher->contact = $request->input('phone');
        $teacher->email = $request->input('email');
        $teacher->description = $request->input('about');

        if ($request->hasfile('file'))
        {
            $filepath = $request->file('file')->store('storage', 'public');
            $teacher->file = $filepath;
        }
      $teacher->save();

      return redirect()->route('teacher.view', $teacher->id)->with('success', 'Teacher successfully added!');

    }
    public function Teacherupdate(Request $request, $id)
    {
        $item = teacher::findorFail($id);
        $item->firstname = $request->input('firstname');
        $item->lastname = $request->input('lastname');
        $item->contact = $request->input('phone');
        $item->email = $request->input('email');
        $item->description = $request->input('about');
        

        if ($request->hasfile('file'))
        {
            if($item->file)
            {
                Storage::disk('public')->delete($item->file);
            }

            $filepath = $request->file('file')->store('storage', 'public');
            $item->file = $filepath;
        }
      $item->save();



        return redirect()->route('teacher.view')->with('success', 'Teacher successfully updated!');
    }
    public function TeacherDelete($id)
    {
        $item = teacher::find($id);

        if(!$item)
        {
            return redirect()->route('teacher.view')->with('error', 'Teacher not found');
        }

        $item->delete();

        return redirect()->route('teacher.view')->with('success', 'Teacher deleted successfully');
    }
    public function ViewCourses()
    {
        $data = course::all();
        return view('courses.Viewcourses')->with('data', $data);
    }
    public function ShowAddcourse()
    {
        return view('courses.Addcourses');

    }
    public function StoreCourse( Request $request)
    {
        $request->validate([
            'course' => 'required',
            'id' => 'required',
            'description' => 'required',

        ]);
        $course = new course();
        $course->course = $request->input('course');
        $course->course_code = $request->input('id');
        $course->description = $request->input('description');

      $course->save();

      return redirect()->route('course.view')->with('success', 'Course successfully added!');

    }
    public function Courseupdate(Request $request, $id)
    {
        $item = course::find($id);
        $item->update($request->all());
        return redirect()->route('course.view')->with('success', 'course successfully updated!');
    }
    public function CourseDelete($id)
    {
        $item = course::find($id);

        if(!$item)
        {
            return redirect()->route('course.view')->with('error', 'Course not found');
        }

        $item->delete();

        return redirect()->route('course.view')->with('success', 'Course deleted successfully');
    }
    public function ViewStudentCourses()
    {
        $data = student::with('courses')->get();
        return view('std-courses.Viewstudentcourse',compact('data'));
    }
    public function ShowstudentCourse()
    {
        $students = student::all();
        $courses = course::all();
        return view('std-courses.AddStudentCourse', compact('students', 'courses'));
    }
    public function StoreStudentCourse(Request $request)
    {
        $request->validate([
            'student_id'=> 'required',
            'course_id' => 'required',
        ]);
         
       student::find($request->input('student_id'))->courses()->attach($request->input('course_id'));
        return redirect()->route('studentcourse.view')->with('success','Student Course Successfully Added');
    }
    public function StudentCourseDelete($studentId, $courseId)
    {

       $student = student::find($studentId);
       $student->courses()->detach($courseId);
     return redirect()->route('studentcourse.view')->with('success', 'Studentcouurse deleted successfully!');
    }
}

