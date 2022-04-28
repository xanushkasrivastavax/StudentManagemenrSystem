<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function view()
    {
        try{
        $user = User::getteacher();
        $course = Course::getallcourse();
        }
        catch(\Exception $exception){
            return back()->withError($exception->getMessage());
        }
        return view('admin.teacher',['user'=>$user,'course'=>$course]);
    }
    

}