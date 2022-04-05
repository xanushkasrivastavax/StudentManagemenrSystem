<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'email','cname','duration',
    ];
    public static function getmodel()
    {
        return Teacher::all();
    }
}
