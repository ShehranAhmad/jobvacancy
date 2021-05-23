<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EmployeeDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProfileController extends Controller
{
    public function profile()
    {
        $user=auth()->user();
        $skills=Category::where('status','active')->orderBy('name','ASC')->get();
        return view('user.profile',get_defined_vars());
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        $user = User::find(Auth::User()->id);
        if ($request->email != $user->email) {
            $request->validate([
                'email' =>'required|email|unique:users',
            ]);
        }
        User::where('id',$user->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->number,
        ]);
        $implode=null;
        if ($request->skills!==null)
        {
            $implode=implode(',',$request->skills);
        }
        $det=EmployeeDetail::where('user_id',$user->id)->first();
        if($det==null)
        {
            EmployeeDetail::create([
                'user_id'=>$user->id,
                'skills'=>$implode,
                'about'=>$request->about,
            ]);
        }
        else{
            $det->update([
                'user_id'=>$user->id,
                'skills'=>$implode,
                'about'=>$request->about,
                'address'=>$request->address,
            ]);
        }
        return redirect()->back()->with('success','Profile has been updated');

    }




    public function profileDelete()
    {
        User::where('id',auth()->user()->id)->update([
            'avatar'=>'uploads/users/default.png',
        ]);
        return redirect()->back()->with('success','Profile picture has been deleted');
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'avatar' =>'mimes:jpeg,jpg,png|required',
        ]);
        $image=$request->avatar;
        $filename = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
        $movedFile = $image->move('uploads/users/', $filename);
        User::where('id',auth()->user()->id)->update([
            'avatar'=>$filename,
        ]);
        return redirect()->back()->with('success','Profile picture has been updated');

    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $password = DB::table('users')->where('id', $user->id)->value('password');

        $this->validate($request, [
            'old_password'          => 'required',
            'password'       => 'required|min:8',
            'confirm_password' =>'required|same:password'
        ]);
        if (Hash::check($request->old_password, $password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success','Your account password has been changed.');
        }
        else{
            return redirect()->back()->with('error','Old Password is incorrect. Try again');
        }

    }
}
