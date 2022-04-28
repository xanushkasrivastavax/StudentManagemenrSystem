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
        try{
        $user = User::getmodel();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
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
        try{
        $user = User::editmodel($id);
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        
        return view('admin.edituser',compact('user'));
    }
    public function postedit($id, Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string|max:255',

            'role' => 'required|string|max:50',

            'email' => 'required|string|email|max:255',

            'admin' => 'boolean',
            
        ]);
        try{
        $user = User::posteditmodel($id);

        $user->name = $request->input('name');

        $user->email = $request->input('email');

        $user->role = $request->input('role');
       
        $user->admin = $request->input('admin');

        $user->save();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }

        return redirect('/student');
    }
    public function delete($id)
    {
        try{
        $user = User::editmodel($id);
        if($user->role == "Student"){
            $student=Student::deletemodel($user->email);
        }
        else{
            $teacher=Teacher::deletemodel($user->email);
        }
        
        $user = User::deletemodel($id);
        $course = Course::deletemodel($id);
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return redirect()->back();
    }
    public function count()
    {
        try{
        $array = [];

        $array[0] = User::countstudent();

        $array[1] = User::countTeacher();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.home',compact('array'));
    }
    public function display()
    {
        try{
        $user = User::get();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.display',compact('user'));
    }
    public function apif(Request $request)
    {
        try{
        $page = 1;
        if($request->page){
            $page=$request->page;
        }
        $user = User::getstudentpaginated($page);
    }
    catch(\Exception $exception){
        echo "Sorry, an error occured "; 
    }
        return response()->json($user,200);
    }
    public function student()
    {
        try{
        $user = User::getstudent();
        $tuser = User::getteacher();
        $course = Course::getallcourse();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.display',['user'=>$user,'course'=>$course,'tuser'=>$tuser]);
    }
    
    public function teacher()
    {
        try{
        $student = Student::getmodel();
        $teacher = Teacher::getmodel();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.tdisplay',['student'=>$student,'teacher'=>$teacher]);
    }
    public function teacherdisplay()
    {
        try{
        $user = User::getteacher();
        $course = Course::getallcourse();
        }
        catch(\Exception $exception){
            echo "Sorry, an error occured "; 
        }
        return view('admin.teacher',['user'=>$user,'course'=>$course]);
    }
    public function addUser()
    {
        return view('auth.register');
    }

}