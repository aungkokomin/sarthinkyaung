<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'courses';
    protected $fillable = ['title','lecturer_id','description','start_date','end_date','course_fee'];

    function categorycourse(){
    	return $this->hasMany('App\CategoryCourse');
    }

    function lecturer(){
    	return $this->hasMany('App\Lecturer','lecturer_id');
    }
}
