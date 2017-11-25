<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategory = SubCategory::get();

        return view('admin.sub-category.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::get();
        return view('admin.sub-category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        //
        $subcategory = new SubCategory($request->except('_token'));
        $subcategory->save();
        return redirect('/admin/sub-category')->with('success',trans('subcategory/message.success.create'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        //
        return view('admin.sub-category.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        //
        $category = Category::get();
        return view('admin.sub-category.edit',compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $category)
    {
        //
        $catgory->update($request->except('_token'));
        return redirect('admin/subcategory')->with('success',trans('subcategory/message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        //
        $catgory->delete();
        return redirect('admin/subcategory')->with('success',trans('subcategory/message.success.delete'));
    }
}
