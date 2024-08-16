<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Session;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->paginate(20);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name'
        ]);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description

        ];
        Category::create($data);
        $request->session()->flash('status', 'Category Created Succesfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description
        ];
        $category->update($data);
        $request->session()->flash('status', 'Category Updated Succesfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
