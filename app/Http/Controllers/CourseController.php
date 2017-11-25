<?php

namespace App\Http\Controllers;

use App\Course;
use App\SubCategory;
use App\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $course = Course::get();
        
        return view('admin.course.index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subcategory = SubCategory::get();
        $lecturer = Lecturer::where('status',1)->first();
        return view('admin.course.create',compact('subcategory','lecturer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $course = new Course($request->except('_token'));
        if ($file = $request->file('img')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/course/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $course['img'] = $safeName;
        }
        $course->save();
        return redirect('/admin/course')->with('success',trans('course/message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        $subcategory = SubCategory::get();
        return view('admin.course.edit',compact('course','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        if ($file = $request->file('img')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/course/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
        }
        $course->img = $safeName;
        $course->update($request->except('_token','img'));
        return redirect('/admin/course')->with('success',trans('course/message.success.edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return redirect('admin/course')->with('success',trans('course/message.success.delete'));
    }
}
