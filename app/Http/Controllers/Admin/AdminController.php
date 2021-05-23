<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
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
