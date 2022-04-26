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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
    }
    public function delete($id)
    {
        $user=User::deletemodel($id);
        $course=Course::deletemodel($id);
        return redirect()->back();
    }
    public function count()
    {
        $array = [];

        $array[0] = User::countstudent();

        $array[1] = User::countTeacher();
        return view('admin.home',compact('array'));
    }
    public function display()
    {
        $user=User::get();
        return view('admin.display',compact('user'));
    }
    public function apif(Request $request)
    {
        $page=1;
        if($request->page){
            $page=$request->page;
        }
        $user=User::getstudentpaginated($page);
        // return view('admin.filterapi',compact('user'));

        return response()->json($user,200);
    }
    public function student()
    {
        $user=User::getstudent();
        $tuser=User::getteacher();
        $course=Course::getallcourse();
        
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
        $user=User::getteacher();
        $course=Course::getallcourse();
        return view('admin.teacher',['user'=>$user,'course'=>$course]);
    }

}