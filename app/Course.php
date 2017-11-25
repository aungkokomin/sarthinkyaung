<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'courses';
    protected $fillable = ['title','lecturer_id','description','start_date','duration','img','course_fee','category_id'];

    function category(){
    	return $this->belongsTo('App\SubCategory','category_id');
    }

    function lecturer(){
    	return $this->belongsTo('App\Lecturer','lecturer_id');
    }
}
