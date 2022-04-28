<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function view()
    {
        try{
        $course = Course::getdistinct();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.vCourse', compact('course'));
    }
    public function delete($id)
    {
        try{
        $course = Course::findanddelete($id);
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        
    }
    public function editcourse($id)
    {
        try{
        $course = Course::editmodel($id);
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.editCourse',compact('course'));

    }
    public function postedit($id, Request $request)
    {
        $this->validate($request, [

            'cname' => 'required|string|max:255',

            'duration' => 'required|int|max:11',

        ]);
        try{
        $course=Course::postedit($id);

        $course->cname = $request->input('cname');
        $course->duration = $request->input('duration');
        
        $course->save();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return Redirect('/cinfo');
    }
    public function getStudent($id,Request $request)
    {
        $course = Course::getStudent($id);
    }
    public function uniquecourse()
    {
        try{
        $course = Course::get()->distinct();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.vCourse',compact('course'));
    }


}