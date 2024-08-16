<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tags = Tag::orderBy('created_at','DESC')->paginate(20);
        return view('admin.tag.index',compact('Tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:Tags,name'
        ]);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'description'=>$request->description
        ];
        Tag::create($data);
        $request->session()->flash('status', 'Tag Created Succesfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'name'=>'required|unique:Tags,name'
        ]);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
            'description'=>$request->description
        ];
        $tag->update($data);
        $request->session()->flash('status', 'Tag Updated Succesfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back();
    }
}
