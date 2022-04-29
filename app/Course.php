<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use ReflectionFunctionAbstract;

class Course extends Model
{
  public function teacher()
  {
    return $this->hasMany(Teacher::class);
  }
  public static function editCourse($id)
  {
    $valid = Course::findOrFail($id);
  }
  public static function findAndDelete($id)
  {
    return Course::where('user_id', $id)->delete();
  }
  public static function getStudent($id)
  {
    $check = Course::findOrFail($id);
    return $check;
  }
  public static function updateCourse($id)
  {
    $real = Course::findOrFail($id);
  }
  public static function viewCourse()
  {
    return Course::all();
  }
  public static function deleteCourse($id)
  {
    $real = Course::where('user_id', $id)->first();
    return $real->delete();
  }
}
