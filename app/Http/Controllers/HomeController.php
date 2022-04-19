<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
    public function getStudent()
    {
        $user=User::getmodel();
        return view('admin.student',compact('user'));
    }
    public function landing()
    {
        return view('home');
    }
    public function course()
    {
        return view('admin.course');
    }
    public function edituser($id)
    {
       $user=User::editmodel($id);
        return view('admin.edituser',compact('user'));
    }
    public function postedit($id, Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string|max:255',

            'role' => 'required|string|max:50',

            'email' => 'required|string|email|max:255',

        ]);

        $user = User::posteditmodel($id);

        $user->name = $request->input('name');

        $user->email = $request->input('email');


        $user->role = $request->input('role');

        $user->save();
        return back();
    }
    public function delete($id)
    {
        $user=User::deletemodel($id);
        return Redirect()->back();
    }
    public function count()
    {
        $array = [];

        $array[0] = User::countstudentmodel();

        $array[1] = User::countTeachermodel();
        return view('admin.home',compact('array'));
    }
    public function display()
    {
        $user=User::get();
        return view('admin.display',compact('user'));
    }
    public function student()
    {
        $user=User::getstudentmodel();
        $tuser=User::getteachermodel();
        $course=Course::getallcoursemodel();
        
        return view('admin.display',['user'=>$user,'course'=>$course,'tuser'=>$tuser]);
    }
    
    public function teacher()
    {
        $student=Student::getmodel();
        $teacher=Teacher::getmodel();
        return view('admin.tdisplay',['student'=>$student,'teacher'=>$teacher]);
    }
    public function teacherdisplay()
    {
        $user=User::getteachermodel();
        $course=Course::getallcoursemodel();
        return view('admin.teacher',['user'=>$user,'course'=>$course]);
    }

}
