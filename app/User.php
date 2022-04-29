<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'admin', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function student()
    {
        return $this->hasOne(student::class);
    }
    public function teacher()
    {
        return $this->hasOne(teacher::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public static function getUser()
    {
        return User::get();
    }
    public static function findUser($id)
    {
        $real = User::findOrFail($id);
        return $real;
    }
    public static function updateUser($id)
    {
        $real = User::findOrFail($id);
        return $real;
    }
    public static function deleteUser($id)
    {
        $real = User::findOrFail($id);
        return $real->delete();
    }
    public static function viewStudentInfo()
    {
        return User::where("role", "=", "Student")->get();
    }
    public static function viewStudentPaginated($page)
    {
        return User::where("role", "=", "Student")->offset(($page - 1) * 10)->limit(10)->get();
    }
    public static function viewTeacherInfo()
    {
        return User::where("role", "=", "Teacher")->get();
    }
    public static function countStudent()
    {
        return User::where("role", "=", "Student")->count();
    }
    public static function countTeacher()
    {
        return User::where("role", "=", "Teacher")->count();
    }
}
