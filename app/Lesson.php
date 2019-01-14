<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $table = "lesson";
    protected $fillable = ['lesson_name','course_id','lesson_length','teacher_name','lesson_desc','lesson_img',
        'video_address','status'];
    public function course(){
        return $this->hasOne('App\Course','id','course_id');
    }
}
