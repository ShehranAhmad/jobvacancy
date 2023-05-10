<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Profiler\Profile;

class CompanyController extends Controller
{
    public function list()
    {
       $users= User::where('role','company')->with('company_detail')->get();

        return view('admin.company.list',get_defined_vars());
    }

    public function add()
    {
        return view('admin.company.add');
    }

    public function edit($slug)
    {
        $company=User::where('slug',$slug)->with('company_detail')->first();
        return view('admin.company.edit',get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|required',
            'name'  => 'required',
            'email' =>'required|email|unique:users',

            'address'  => 'required',


        ]);
        if($request->image)
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|required'
            ]);
            $image=$request->image;
            $avatar = 'uploads/company/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move(public_path('uploads/company/'), $avatar);
        }
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make(12345678),
            'phone'=>$request->phone,
            'avatar'=>$avatar,
            'status'=>'active',
            'role'=>'company',
            'auth_provider'=>'site',
            'slug'=>\Illuminate\Support\Str::slug($request->name,'-').'-'.Carbon::now()->format('dmyHi'),
        ]);
        CompanyDetail::create([
            'about'=>$request->about,
            'user_id'=>$user->id,
            'address'=>$request->address,
            'postal_code'=>$request->postal_code,
        ]);

        return redirect()->route('admin.company')->with('message','Company has been added');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'address'  => 'required',
        ]);
        $user=User::where('id',$request->id)->first();
        if ($request->email != $user->email)
        {
            $request->validate([
                'email' =>'required|email|unique:users',
            ]);
        }

        if($request->image)
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|required'
            ]);
            $image=$request->image;
            $avatar = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move(public_path('uploads/users/'), $avatar);
        }
        else
        {
            $avatar=$user->avatar;
        }

        $company=User::where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make(12345678),
            'phone'=>$request->phone,
            'avatar'=>$avatar,
            'status'=>'active',
            'role'=>'company',
            'auth_provider'=>'site',
            'slug'=>\Illuminate\Support\Str::slug($request->name,'-').'-'.Carbon::now()->format('dmyHi'),
        ]);
        CompanyDetail::where('user_id',$request->id)->update([
            'about'=>$request->about,
            'address'=>$request->address,
            'postal_code'=>$request->postal_code,
        ]);

        return redirect()->route('admin.company')->with('message','Company has been updated');

    }


    public function detail($slug)
    {
        $company=User::where('slug',$slug)->first();
        return view('admin.company.detail',get_defined_vars());
    }

    public function block($id)
    {
        User::where('id',$id)->update([
            'status'=>'inactive'
        ]);

        return redirect()->back()->with('message','Company has been blocked');
    }

    public function unblock($id)
    {
        User::where('id',$id)->update([
            'status'=>'active'
        ]);

        return redirect()->back()->with('message','Company has been activated');
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('admin.company')->with('message','Company has been deleted ');
    }
}
