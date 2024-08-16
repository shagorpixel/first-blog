<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function home(){
        $recentpost = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();
        $allpost = Post::with('category','user')->orderBy('created_at','DESC')->paginate(9);
        return view('website.homepage',compact('recentpost','allpost'));
    }
    public  function about(){
        return view('website.about');
    }
    public function contact(){
        return view('website.contact');
    }
    public function categpry($slug){
        $category = Category::where('slug',$slug)->first();
        $posts = Post::with('category')->where('category_id',$category->id)->paginate(9);

        return view('website.category',compact('category','posts'));
    }
    public function tag($slug){
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->paginate(9);
        return view('website.tag',compact('tag','posts'));
    }
    public function postpage(Post $post, $slug){
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::with('category','user','tags')->where('slug',$slug)->first();
        $posts = Post::with('category','user','tags')->inRandomOrder()->limit(3)->get();

        return view('website.post',compact('post','categories','tags','posts'));
    }

}
