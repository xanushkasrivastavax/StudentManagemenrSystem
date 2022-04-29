<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'email', 'cname', 'duration',
    ];
    public static function viewTeacher()
    {
        return Teacher::all();
    }
    public static function count()
    {
        return Teacher::all()->count();
    }
    public static function deleteTeacher($email)
    {
        return Teacher::where('email', $email)->delete();
    }
}
