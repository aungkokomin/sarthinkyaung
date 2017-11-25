<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    //
    protected $table = "course_categories";
    protected $fillable = ['subcategory_id','course_id','description'];

    function subcategory(){
    	return $this->belongsTo('App\SubCategory','subcategory_id');
    }

    function course(){
    	return $this->belongsTo('App\Course','course_id');
    }
}
