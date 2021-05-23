<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\FollowCompany;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    public function follow(Request $request)
    {
        FollowCompany::create([
            'user_id'=>auth()->user()->id,
            'company_id'=>$request->company,
        ]);
        return response()->json(['success'=>'Company has been added to followup list']);
    }

    public function unfollow(Request $request)
    {
        FollowCompany::where('user_id',auth()->user()->id)->where('company_id',$request->company)->delete();
        return response()->json(['success'=>'Company has been unfllolwed']);
    }

    public function favorite(Request $request)
    {
        Favorite::create([
            'user_id'=>auth()->user()->id,
            'company_id'=>$request->company,
            'job_id'=>$request->job,
        ]);
        return response()->json(['success'=>'Job has been added to favorite list']);
    }
}
