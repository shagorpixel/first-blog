<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time(). '-' . uniqid().'.'. $image->getClientOriginalExtension();
            $image->move('backend/img/user',$imageName);
        };

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'description'=>$request->description,
            'image'=>$imageName
        ];

        User::create($data);
        $request->session()->flash('status', 'User Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>'required|max:255|string',
            'email'=>'required|email',
            'password'=>'nullable|min:8',

        ]);
        $oldImage = 'backend/img/user/'.$user->image;


        if($image = $request->file('image')){
            if($user->image != Null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }
            $imageName = time(). '-' . uniqid().'.'. $image->getClientOriginalExtension();
            $image->move('backend/img/user',$imageName);

        }else{
            $imageName= $user->image;
        }


        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'description'=>$request->description,
            'image'=>$imageName
        ];

        $user->update($data);
        $request->session()->flash('status', ' Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $oldImage = 'backend/img/user/'.$user->image;
        if($user){
            if($user->image != Null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }
            $user->delete();
            session()->flash('success','User Deleted Successfully');
        }

        return redirect()->back();
    }

    public function profile(){
        $user = auth()->user();
        return view('admin.user.profile',compact('user'));
    }
}
