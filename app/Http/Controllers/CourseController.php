<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;


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
        // select('cname')->distinct()->
        return view('admin.vCourse', compact('course'));
    }
    public function delete($id)
    {
        $course=Course::find($id)->delete();
        return Redirect()->back();
    }
    public function editcourse($id)
    {

        $course=Course::find($id);
        return view('admin.editCourse',compact('course'));

    }
    public function postedit($id, Request $request)
    {
        $this->validate($request, [

            'cname' => 'required|string|max:255',

            'duration' => 'required|int|max:11',

        ]);

        $course=Course::find($id);

        $course->cname = $request->input('cname');
        $course->duration = $request->input('duration');
        
        $course->save();
    }
    public function count()
    {
        // $array=[];
        // $array=Course::all(*)->count;
        // return view('admin.home', compact('array'));
    }
    public function getStudent($id,Request $request)
    {
        $course=Course::find($id);
    }

}
