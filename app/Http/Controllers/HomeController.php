<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $course = Course::get();
        $category = Category::get();
        return view('home',compact('course','category'));
    }

    public function categorized($category)
    {   
        $course = Course::join('sub_categories','sub_categories.id','=','courses.category_id')->where('sub_categories.category_id',$category)->get();
        $category = Category::get();
        return view('category_course',compact('course','category'));
    }
}
