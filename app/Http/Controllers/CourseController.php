<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function handle(Request $request){
        if($request->isMethod("POST"))
        {
           $course = new Course;
           $course->cname = $request->name;
           $course->duration = $request->duration;
           $course->save();
        }
        else{
          return view('admin.course');
        }
    }

    public function getCourse()
    {
        $course=Course::get();
        return view('admin.vCourse', compact('course'));
    }
    public function delete($id)
    {
        $course=Course::find($id)->delete();
        return Redirect()->back();
    }

}
