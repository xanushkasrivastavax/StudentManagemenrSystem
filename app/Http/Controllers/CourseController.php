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
        return view('admin.vCourse', compact('course'));
    }
    public function delete($id)
    {
        try {
            $course = Course::findAndDelete($id);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
    }
    public function editcourse($id)
    {
        try {
            $course = Course::editCourse($id);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('admin.editCourse', compact('course'));
    }
    public function postedit($id, Request $request)
    {
        $this->validate($request, [

            'cname' => 'required|string|max:255',

            'duration' => 'required|int|max:11',

        ]);
        try {
            $course = Course::updateCourse($id);

            $course->cname = $request->input('cname');
            $course->duration = $request->input('duration');

            $course->save();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return Redirect('/cinfo');
    }
    public function getStudent($id, Request $request)
    {
        $course = Course::getStudent($id);
    }
    public function uniquecourse()
    {
        try {
            $course = Course::get()->distinct();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('admin.vCourse', compact('course'));
    }
}
