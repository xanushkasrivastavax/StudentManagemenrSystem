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
        $user=User::get();
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
       $user=User::find($id);
        return view('admin.edituser',compact('user'));
    }
    public function postedit($id, Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string|max:255',

            'role' => 'required|string|max:50',

            'email' => 'required|string|email|max:255',

        ]);

        $user = User::find($id);

        $user->name = $request->input('name');

        $user->email = $request->input('email');


        $user->role = $request->input('role');

        $user->save();
    }
    public function delete($id)
    {
        $user=User::find($id)->delete();
        return Redirect()->back();
    }
    public function count()
    {
        $array = [];

        $array[0] = User::where("role", "=", "Student")->count();

        $array[1] = User::where("role", "=", "Teacher")->count();
        return view('admin.home',compact('array'));
    }
    public function display()
    {
        $user=User::get();
        return view('admin.display',compact('user'));
    }
    public function student()
    {
        $user=User::where("role", "=", "Student")->get();
        $tuser=User::where("role","=","Teacher")->get();
        $course=Course::all();
        
        return view('admin.display',['user'=>$user,'course'=>$course,'tuser'=>$tuser]);
    }
    
    public function teacher()
    {
        $student=Student::all();
        $teacher=Teacher::all();
        return view('admin.tdisplay',['student'=>$student,'teacher'=>$teacher]);
    }

}
