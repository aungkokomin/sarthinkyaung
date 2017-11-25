<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    //
    protected $table = 'lecturers';
    protected $fillable = ['username','password','name','address','DOB','email','phone','nrc','gender','status'];
}
