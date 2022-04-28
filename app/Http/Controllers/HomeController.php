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
    public function viewUser()
    {
        try{
        $user = User::getUser();
        }
        catch(\Exception $exception){
            return back()->withError($exception->getMessage()); 
        }
        return view('admin.student',compact('user'));
    }
    public function dashboard()
    {
        return view('home');
    }
    public function course()
    {
        return view('admin.course');
    }
    public function welcomepage()
    {
        return view('welcome');
    }
    public function edit($id)
    {
        try{
        $user = User::editmodel($id);
        }
        catch(\Exception $exception){
            return back()->withError($exception->getMessage());
        }
        
        return view('admin.edituser',compact('user'));
    }
    public function update($id, Request $request)
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
            return back()->withError($exception->getMessage()); 
        }

        return redirect('/viewUsers');
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
            return back()->withError($exception->getMessage()); 
        }
        return redirect()->back();
    }
    public function countUser()
    {
        try{
        $array = [];

        $array[0] = User::countstudent();

        $array[1] = User::countTeacher();
        } catch(\Exception $exception){
            return back()->withError($exception->getMessage()); 
        }
        return view('admin.home',compact('array'));
    }
    public function apif(Request $request)
    {
        $page = 1;
        if($request->page){
            $page=$request->page;
        }
        try{
        $user = User::getstudentpaginated($page);
    }
    catch(\Exception $exception){
        return back()->withError($exception->getMessage());
    }
        return response()->json($user,200);
    }
    public function addUser()
    {
        return view('auth.register');
    }

}