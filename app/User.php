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
        'name', 'email','role','admin', 'password',
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
    public static function getmodel()
    {
        return User::get();
    }
    public static function editmodel($id)
    {
        return User::find($id);
    }
    public static function posteditmodel($id)
    {
        return User::find($id);
    }
    public static function deletemodel($id)
    {
       
        return User::find($id)->delete();
    }
    public static function getstudent()
    {
        return User::where("role", "=", "Student")->get();
    }
    public static function getstudentpaginated($page)
    {
        return User::where("role", "=", "Student")->offset(($page - 1) * 10)->limit(10)->get();
    }
    public static function getteacher()
    {
        return User::where("role","=","Teacher")->get();
    }
    public static function countstudent()
    {
        return User::where("role", "=", "Student")->count();
    }
    public static function countTeacher()
    {
       return User::where("role", "=", "Teacher")->count();
    }
}