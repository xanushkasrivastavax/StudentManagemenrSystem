<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use ReflectionFunctionAbstract;

class Course extends Model
{
  public function teacher(){
    return $this->hasMany(Teacher::class);
  }
}
