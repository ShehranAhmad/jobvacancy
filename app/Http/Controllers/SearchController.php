<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jobs;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function jobDetail($slug)
    {
        $job=Jobs::where('slug',$slug)->with('company')->first();
        return view('front.job-detail',get_defined_vars());
    }

    public function companyDetail($slug)
    {
        $company=User::where('role','company')->where('slug',$slug)->with(['company_detail','jobs'])->first();
        return view('front.company-detail',get_defined_vars());
    }

    public function search(Request $request)
    {


        $jobs=Jobs::orderBy('is_featured','Desc')->orderBy('created_at','DESC');
        $categories=Category::orderBy('name','ASC')->get();
        $companies=User::where('role','company')->orderBy('name','ASC')->get();

        if($request->company_id)
        {
            $jobs=$jobs->where('company_id',$request->company_id);
        }
//        if($request->category)
//        {
//            $jobs=$jobs->where('category','Like','%'.$request->category.'%');
//        }
        if($request->skill)
        {
            $inc_count=Category::where('name',$request->skill)->first();

            $inc_count->update([
                'searches'=>$inc_count->searches+1,
            ]);
            $jobs=$jobs->where('category','Like','%'.$request->skill.'%');
        }
        if($request->city)
        {
            $jobs=$jobs->where('address','Like','%'.$request->city.'%');
        }
        if($request->employee_type)
        {
            $jobs=$jobs->whereIn('employee_type',$request->employee_type);
        }
        if($request->level)
        {
            $jobs=$jobs->whereIn('job_level',$request->level);

        }
        $jobs=$jobs->with('company')->paginate(20);

        return view('front.jobs',get_defined_vars());
    }

    public function findSkill(Request $request)
    {
        $skills=Category::where('name','Like','%'.$request->skill.'%')->get();
        $html=view('_partial.front.search',get_defined_vars())->render();

        return response()->json(['html'=>$html]);
    }

    public function findCompany(Request $request)
    {
        $companies=User::where('role','company')->where('name','Like','%'.$request->name.'%')->get();
        $html=view('_partial.front.company',get_defined_vars())->render();
        return response()->json(['html'=>$html]);
    }
}
