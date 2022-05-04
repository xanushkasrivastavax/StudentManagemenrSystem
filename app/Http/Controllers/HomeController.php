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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $array = [];

            $array[0] = User::countStudent();

            $array[1] = User::countTeacher();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('admin.home', compact('array'));
    }
    public function viewUser()
    {
        try {
            $user = User::getUser();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('admin.allUsers', compact('user'));
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
        try {
            $user = User::findUser($id);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.editUser', compact('user'));
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'email' => 'required|string|email|max:255',
            'admin' => 'boolean',

        ]);
        try {
            $user = User::updateUser($id);

            $user->name = $request->input('name');

            $user->email = $request->input('email');

            $user->role = $request->input('role');

            $user->admin = $request->input('admin');

            $user->save();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('/viewUsers');
    }
    public function delete($id)
    {
        try {
            $user = User::findUser($id);
            if ($user->role == "Student") {
                $student = Student::deleteUser($user->email);
            } else {
                $teacher = Teacher::deleteTeacher($user->email);
            }

            $user = User::deleteUser($id);
            $course = Course::deleteCourse($id);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return redirect()->back();
    }
    public function countUser()
    {

        return view('admin.home', compact('array'));
    }
    public function viewUserApiFunction(Request $request)
    {
        $page = 1;
        if ($request->page) {
            $page = $request->page;
        }
        try {
            $user = User::viewStudentPaginated($page);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return response()->json($user, 200);
    }
    public function addUser()
    {
        return view('auth.register');
    }
}
