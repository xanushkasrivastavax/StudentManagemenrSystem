<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'cname', 'duration',
    ];
    public static function viewStudent()
    {
        return Student::all();
    }
    public static function deleteUser($email)
    {
        return Student::where('email', $email)->delete();
    }
}
