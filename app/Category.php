<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";
    protected $fillable = ['name','description'];

    function subcategory(){
    	return $this->hasMany('App\SubCategory');
    }
}
