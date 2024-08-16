<?php

namespace App\Http\Controllers;
use App\Models\Contactmsg;
use Illuminate\Http\Request;

class ContactmsgController extends Controller
{

    public function index(){
        $messages = Contactmsg::latest()->paginate(20);
        return view('admin.message.index',compact('messages'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|max:50',
            'subject'=>'required|max:100',
            'message'=>'required',
        ]);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ];
        Contactmsg::create($data);
        $request->session()->flash('status','Messege Send Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contactmsg $message)
    {
        return view('admin.message.show',compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contactmsg $message)
    {

        $message->delete();
        return redirect()->back();
    }
}
