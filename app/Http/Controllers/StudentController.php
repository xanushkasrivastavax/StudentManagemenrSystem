<?php

namespace App\Http\Controllers;
use App\Course;
use App\User;
use App\Student;
use App\Teacher;

use Illuminate\Http\Request;

class StudentController extends Controller
{
  public function view()
  {
      try{
      $student = User::getstudent();
      $teacher = User::getteacher();
      $course = Course::getallcourse();
      }
      catch(\Exception $exception){
        return back()->withError($exception->getMessage()); 
      }
      return view('admin.display',['user'=>$student,'course'=>$course,'tuser'=>$teacher]);
  }
  public function viewRelations()
  {
      try{
      $student = Student::getmodel();
      $teacher = Teacher::getmodel();
      }
      catch(\Exception $exception){
        return back()->withError($exception->getMessage());
      }
      return view('admin.tdisplay',['student'=>$student,'teacher'=>$teacher]);
  }
    
}
