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
    $valid = Course::find($id);
    if(empty($valid))
    return "NULL";
    else
    return $valid;
  }
  public static function findanddelete($id)
  {
    return Course::where('user_id', $id)->delete();
  }
  public static function getStudent($id)
  {
    $check = Course::find($id);
    if(empty($check)){
      return "NULL";
    }
    else{
      return $check;
    }
  }
  public static function postedit($id)
  {
    $real = Course::find($id);
    if(empty($real))
    return "NULL";
    else
    return $real;
  }
  public static function getallcourse()
  {
    return Course::all();
  }
  public static function getdistinct()
  {
    return Course::distinct('cname')->get();
  }
  public static function deletemodel($id)
  {  
    $real = Course::find($id);
    if(empty($real))
      return "NULL";
    else
      return $real->delete(); 
  }
}