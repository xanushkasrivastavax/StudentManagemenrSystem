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
    try {
      $student = User::viewStudentInfo();
      $teacher = User::viewTeacherInfo();
      $course = Course::viewCourse();
    } catch (\Exception $exception) {
      return back()->withError($exception->getMessage());
    }
    return view('admin.allStudents', ['user' => $student, 'course' => $course, 'tuser' => $teacher]);
  }
  public function viewRelations()
  {
    try {
      $student = Student::viewStudent();
      $teacher = Teacher::viewTeacher();
    } catch (\Exception $exception) {
      return back()->withError($exception->getMessage());
    }
    return view('admin.teacherStudentRelation', ['student' => $student, 'teacher' => $teacher]);
  }
}
