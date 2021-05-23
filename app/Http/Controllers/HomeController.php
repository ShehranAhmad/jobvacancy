<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\HiringCompany;
use App\Models\Inquiry;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $trending_jobs=Category::where('searches','>',0)->orderBy('searches','DESC')->take(8)->get();
        $blogs=Blog::orderBy('created_at','DESC')->take(3)->get();
        $events=Event::orderBy('created_at','DESC')->take(3)->get();
        $comp_logos=HiringCompany::all();
        return view('front.index',get_defined_vars());
    }

    public function about()
    {
        return view('front.about');
    }

    public function companies()
    {
        $companies=User::where('role','company')->paginate(30);
        return view('front.company',get_defined_vars());
    }





    public function contact()
    {
        return view('front.contact');
    }

    public function blog()
    {
        $blogs=Blog::orderBy('created_at','DESC')->where('visibility','showed')->get();
        return view('front.blog',get_defined_vars());
    }

    public function blogDetail($slug)
    {
        $blog=Blog::where('slug',$slug)->first();
        $categories=Jobs::all()->unique('category')->take(6)->pluck('category')->toArray();

        $jobs=Jobs::orderBy('created_at','DESC')->take(3)->get();
        return view('front.blog-detail',get_defined_vars());
    }

    public function event()
    {
        $events=Event::orderBy('created_at','DESC')->get();
        return view('front.event',get_defined_vars());
    }

    public function eventDetail($slug)
    {
        $event=Event::where('slug',$slug)->first();
        $events=Event::orderBy('created_at','DESC')->take(3)->get();
        $jobs=Jobs::orderBy('created_at','DESC')->take(3)->get();
        return view('front.event-detail',get_defined_vars());
    }

    public function inquiryStore(Request $request)
    {
        Inquiry::create($request->all());
        return redirect()->route('inquiry.submitted');
    }

    public function inquirySubmitted()
    {
        return view('thanks.inquiry_submitted');
    }




}
