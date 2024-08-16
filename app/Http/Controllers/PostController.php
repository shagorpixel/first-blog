<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Post = Post::orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index',compact('Post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = Tag::all();
        $category = Category::all();
        return view('admin.post.create',compact('category','tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:Posts,title',
            'image'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);

        $imageName = '';

        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('website/images/posts',$imageName);
        }
        $data = [
            'title'=>$request->title,
            'slug'=>Str::slug($request->title, '-'),
            'image'=>$imageName,
            'description'=>$request->description,
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'published_date'=> Carbon::now()

        ];
       Post::create($data)->tags()->attach($request->tags);
        $request->session()->flash('status', 'Post Created Succesfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tag = Tag::all();
        $category = Category::all();
        return view('admin.post.edit',compact('post','category','tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
            $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);

        $oldImage ='website/images/posts/'.$post->image;

        if($image = $request->file('image')){

            if(file_exists($oldImage)){
                unlink($oldImage);
            }

            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('website/images/posts',$imageName);
        }else{
            $imageName = $post->image;
        }
        $data = [
            'title'=>$request->title,
            'slug'=>Str::slug($request->title, '-'),
            'image'=>$imageName,
            'description'=>$request->description,
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'published_date'=> $post->published_date
        ];

        $post->tags()->sync($request->tags);
        $post->update($data);
        $request->session()->flash('status', 'Post Updated Succesfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $oldImage ='website/images/posts/'.$post->image;
        if(file_exists($oldImage)){
            unlink($oldImage);
        }
        $post->delete();
        return redirect()->back();
    }
}
