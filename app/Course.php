<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use ReflectionFunctionAbstract;

class Course extends Model
{
  public function teacher(){
    return $this->hasMany(Teacher::class);
  }
  public static function editmodel($id)
  {
     return Course::find($id);
  }
  public static function deletemodel($id)
  {
    return Course::find($id)->delete();
  }
  public static function getStudentmodel($id)
  {
    return Course::find($id);
  }
  public static function posteditmodel($id)
  {
    return Course::find($id);
  }
  public static function getallcoursemodel()
  {
    return Course::all();
  }
  public static function getdistinctmodel()
  {
    return Course::select('cname')->distinct()->get();
  }
  // public static function countmodel()
  // {
  //   return Coure::all()->distinct
  // }
}
