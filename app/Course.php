<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';
    protected $fillable = ['course_name','profession_id','course_price','course_desc','course_img'];
    public function profession(){
        return $this -> hasOne('App\Profession','id','profession_id');
    }
    public function lession(){
        return $this->hasMany('App\Lesson','course_id','id');
    }
}
