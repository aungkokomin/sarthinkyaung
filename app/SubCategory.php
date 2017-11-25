<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $table = 'sub_categories';
    protected $fillable = ['name','description','category_id'];

    function course(){
    	return $this->hasMany('App\Course');
    }

    function category(){
    	return $this->belongsTo('App\Category','category_id');
    }
}
