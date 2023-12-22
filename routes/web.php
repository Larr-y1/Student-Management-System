<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Home');
});

//registration form to database
Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'store'])->name('Home');

//login
Route::get('/login ',[LoginController::class,'showlogin'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout']);

//student and admin dashboard
Route::middleware(['Login', 'Admin'])->group(function () {
    Route::get('/admin/home',[HomeController::class,'Adminhomepage'])->name('admin.home');
});
Route::middleware(['Login', 'student'])->group(function (){
 Route::get('/student/home',[HomeController::class,'Studenthomepage'])->name('student.home');
});

//Admin controller
//dashboard
//Applications
Route::get('/Applications/View',[AdminController::class,'ViewApplications']);

//users
Route::get('/users/View',[AdminController::class,'ViewUsers'])->name('user.view');
Route::get('/users/add/{id}',[AdminController::class,'ShowAddUsers'])->name('showadd');
Route::post('/users/add',[AdminController::class,'StoreUsers'])->name('add');
Route::put('/users/{id}/update',[AdminController::class,'Userupdate'])->name('user.update');
Route::delete('/users/{id}/delete',[AdminController::class,'UserDelete'])->name('user.delete');


//Route::post('/users/add{id}',[AdminController::class,'Fetchid'])->name('fetchid');

//students
Route::get('/student/views/',[AdminController::class,'viewStudents'])->name('students.view');
Route::get('/student/add/{id}',[AdminController::class,'ShowAddStudents'])->name('showaddstudent');
Route::post('/student/add',[AdminController::class,'StoreStudents'])->name('addstudent');
Route::put('/student/{id}/update',[AdminController::class,'Studentupdate'])->name('student.update');
Route::delete('/student/{id}/delete',[AdminController::class,'StudentDelete'])->name('student.delete');

//teachers
Route::get('/teachers/View',[AdminController::class,'ViewTeachers'])->name('teacher.view');
Route::get('/teacher/add/',[AdminController::class,'ShowAddteacher'])->name('showaddteacher');
Route::post('/teacher/add/',[AdminController::class,'StoreTeachers'])->name('addteacher');
Route::put('/teacher/{id}/update',[AdminController::class,'Teacherupdate'])->name('teacher.update');
Route::delete('/teacher/{id}/delete',[AdminController::class,'TeacherDelete'])->name('teacher.delete');

//courses
Route::get('/courses/View',[AdminController::class,'ViewCourses'])->name('course.view');
Route::get('/course/add/',[AdminController::class,'ShowAddcourse'])->name('showaddcourse');
Route::post('/course/add',[AdminController::class,'StoreCourse'])->name('addcourse');
Route::put('/course/{id}/update',[AdminController::class,'Courseupdate'])->name('course.update');
Route::delete('/course/{id}/delete',[AdminController::class,'CourseDelete'])->name('course.delete');

//student_courses
Route::get('/student/course/View',[AdminController::class,'ViewStudentCourses'])->name('studentcourse.view');
Route::get('/student/course/add/',[AdminController::class,'ShowstudentCourse'])->name('showaddStudentCourse');
Route::post('student/course/add',[AdminController::class,'StoreStudentCourse'])->name('addstudentcourse');
Route::delete('student/course/{studentId}/{courseId}/delete',[AdminController::class,'StudentCourseDelete'])->name('studentcourse.delete');






Route::view('/Applications','Applications/view');







