<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CompanyDetail;
use App\Models\job;
use App\Models\Jobs;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function list()
    {
      //  $companies=User::where('role','company')->get();
        $jobs=Jobs::where('status',true)->orderBy('created_at','DESC')->with('company')->get();
        return view('admin.job.list',get_defined_vars());
    }

    public function add()
    {
        $companies=User::where('role','company')->get();
        $categories=Category::orderBy('name')->get();
        $skills=Skill::all();
        return view('admin.job.create',get_defined_vars());
    }

    public function edit($slug)
    {
        $companies=User::where('role','company')->get();
        $categories=Category::orderBy('name')->get();
        $skills=Skill::all();
        $job=Jobs::where('slug',$slug)->first();
        return view('admin.job.edit',get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'address'=>'required',
            'link'=>'required',
            'title'=>'required',
            'category_name'=>'required',
            'employee_type'=>'required',
            'description'=>'required',
            'job_level'=>'required',
        ]);

        $featured=true;
        if($request->is_featured==null)
        {
            $featured=false;
        }
        Jobs::create([
            'company_id'=>$request->company_id,
            'address'=>$request->address,
            'link'=>$request->link,
            'title'=>$request->title,
            'category'=>implode(',',$request->category_name),
            //'job_type'=>$request->job_type,
            'employee_type'=>$request->employee_type,
            'experience'=>$request->experience,
            'salary'=>$request->salary,
            'description'=>$request->description,
            'job_level'=>$request->job_level,
            'is_featured'=>$featured,
            'slug'=>Carbon::today()->format('dmyHi').'-'.Str::slug($request->title,'-'),
        ]);

        return redirect()->route('admin.job')->with('message','Job has been added');
    }

    public function update(Request $request)
    {

        $request->validate([
            'address'=>'required',
            'link'=>'required',
            'title'=>'required',
            'category_name'=>'required',
            'employee_type'=>'required',
            'description'=>'required',
            'job_level'=>'required',
        ]);
        $featured=true;
       if($request->is_featured==null)
       {
           $featured=false;
       }


        Jobs::where('id',$request->id)->update([
            'company_id'=>$request->company_id,
            'address'=>$request->address,
            'link'=>$request->link,
            'title'=>$request->title,
            'category'=>implode(',',$request->category_name),
            //'job_type'=>$request->job_type,
            'employee_type'=>$request->employee_type,
            'experience'=>$request->experience,
            'salary'=>$request->salary,
            'description'=>$request->description,
            'job_level'=>$request->job_level,
            'is_featured'=>$featured,
            'slug'=>Carbon::today()->format('dmyHi').'-'.Str::slug($request->title,'-'),
        ]);
        return redirect()->route('admin.job')->with('message','Job has been updated');

    }

    public function detail($slug)
    {
        $job=Jobs::where('slug',$slug)->with('company')->first();
        return view('admin.job.detail',get_defined_vars());
    }

    public function delete($id)
    {
        Jobs::where('id',$id)->delete();
        return redirect()->route('admin.job')->with('message','Job has been deleted');

    }
}
