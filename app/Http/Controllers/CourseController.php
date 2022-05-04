<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function view()
    {
        try {
            $course = Course::viewCourse();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('admin.viewCourse', compact('course'));
    }
    public function delete($id)
    {
        try {
            $course = Course::findAndDelete($id);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
    }
    public function getStudent($id, Request $request)
    {
        $course = Course::getStudent($id);
    }
 
}
