<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Contactmsg;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index(){
        $postCount = Post::all()->count();
        $categoryCount = Category::all()->count();
        $messegeCount = Contactmsg::all()->count();
        $userCount = User::all()->count();
        $Post = Post::latest()->take(5)->get();
        return view('admin.index',compact('Post','postCount','categoryCount','messegeCount','userCount'));
    }
}
