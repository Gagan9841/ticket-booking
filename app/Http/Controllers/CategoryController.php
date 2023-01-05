<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        // return $category;
        return view("admin.category", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.categoryCreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            "category_name" => "required",
        ]);

        Category::create([
            "name" => $request->category_name,
            "slug"=> Str::slug($request->category_name),
        ]);
        return redirect('/admin/category')->with('success',"Category Added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category_name)
    {
        return $category_name;
        return view("admin.categoryEdit", compact('category_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category_name)
    {
        // return $request;
        // $slug = Str::slug($request->category_name);
        // request()->validate([
        //     "category_name" => "required",
        // ]);

        $category_name->update([
            "name" => $request->category,
            "slug"=> Str::slug($request->category),
        ]);

        return redirect("/admin/category")->with('info', "category Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category_name)
    {
        $category_name->delete();
        return redirect()->back()->with('warning',"Category deleted successfully.");


    }
}
