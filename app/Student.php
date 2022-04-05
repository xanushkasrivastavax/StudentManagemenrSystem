<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email','cname','duration',
    ];
    public static function getmodel()
    {
        return Student::all();
    }
}
