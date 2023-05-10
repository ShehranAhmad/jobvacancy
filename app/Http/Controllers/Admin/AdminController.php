<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $user=auth()->user();
        return view('admin.profile',get_defined_vars());
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::User()->id);

        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        if ($request->email != $user->email) {
            $request->validate([
                'email' =>'required|email|unique:users',
            ]);
        }
        if($request->password)
        {
            $this->validate($request, [
                'password'       => 'required|min:8',
                'confirm_password' =>'required|same:password'
            ]);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if($request->hasfile('image')){
            // profile image code
            $request->validate([
                'image' =>'mimes:jpeg,jpg,png|required',
            ]);
            $image=$request->image;
            $filename = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move(public_path('uploads/users/'), $filename);
            $user->avatar = $filename;
        }
        $user->save();
        return redirect()->back()->with('message', 'Profile has been updated');
    }

    public function inquiries()
    {
        $inquiries=Inquiry::where('status','active')->orderBy('created_at','DESC')->get();
        return view('admin.inquiry.list',get_defined_vars());
    }

    public function inquiriesDetail($id)
    {
        $inquiry=Inquiry::where('id',$id)->first();
        return view('admin.inquiry.detail',get_defined_vars());
    }

    public function inquiriesClose($id)
    {
        $inquiry=Inquiry::where('id',$id)->update([
            'status'=>'inactive',
        ]);
        return redirect()->route('admin.inquiries')->with('message','Inquiry has been closed');
    }
}
