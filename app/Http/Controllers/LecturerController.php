<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\User;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lecturer = Lecturer::get();
        return view('admin.lecturer.index',compact('lecturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lecturer_register');
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
        $lecturer = new Lecturer($request->except('_token','password_confirmation'));
        $lecturer->password = bcrypt($request->password);
        $lecturer->save();
        return redirect('/');
    }

    /**
     * Confirm the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function confirm(Lecturer $lecturer)
    {
        //
        $user = new User();
        $user->name = $lecturer->name;
        $user->email    = $lecturer->email;
        $user->password = $lecturer->password;
        $user->address  = $lecturer->address; 
        $user->DOB      = $lecturer->DOB; 
        $user->phone    = $lecturer->phone; 
        $user->nrc      = $lecturer->nrc; 
        $user->gender   = $lecturer->gender;   
        $user->user_role = 'lecturer';
        $user->save();
        $lecturer->status = '1';
        $lecturer->update();
        return redirect('admin/lecturer');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
        return view('admin.lecturer.show',compact($lecturer));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
        return view('lecturer_register',compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
        $password = bcrypt($request->password);
        $lecturer->update($request->except('_token'));
        $lecturer->password = $password;
        $lecturer->update();
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
