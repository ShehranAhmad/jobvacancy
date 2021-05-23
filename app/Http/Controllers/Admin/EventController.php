<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function list()
    {
        $events=Event::orderBy('created_at','DESC')->get();
        return view('admin.event.list',get_defined_vars());
    }

    public function add()
    {
        $companies=User::where('role','company')->get();
        return view('admin.event.add',get_defined_vars());
    }

    public function edit($id)
    {
        $event=Event::where('id',$id)->first();
        $companies=User::where('role','company')->get();
        return view('admin.event.edit',get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id'=>'required',
            'title'=>'required',
            'organized_by'=>'required',
            'date'=>'required',
            'address'=>'required',
            'link'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $data = $request->except('_token');
        $count=null;
        $name = $count.time().'_'.str_replace(' ', '-', $request->image->getClientOriginalName());
        $data['image']= $request->image->move('uploads/events/images',$name);
        $slug = Str::slug($data['title'], '-');
        $data['slug'] = $slug;
        $data['is_free']=true;
        $data['is_physical']=true;
        if($request->is_free==null)
        {
            $data['is_free']=false;
        }
        if($request->is_physical==null)
        {
            $data['is_physical']=false;
        }
        Event::create($data);
        return redirect()->route('admin.event.list')->with('message','Event has been added');
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_id'=>'required',
            'title'=>'required',
            'organized_by'=>'required',
            'date'=>'required',
            'address'=>'required',
            'link'=>'required',
            'description'=>'required',
        ]);
        $data = $request->except('_token');
        $event=Event::where('id',$request->id)->first();
        $data['image']=$event->image;
        if($request->image)
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|required'
            ]);
            $count=null;
            $name = $count.time().'_'.str_replace(' ', '-', $request->image->getClientOriginalName());
            $data['image']= $request->image->move('uploads/events/images',$name);
        }
        $slug = Str::slug($data['title'], '-');
        $data['slug'] = $slug;
        $data['is_free']=true;
        $data['is_physical']=true;
        if($request->is_free==null)
        {
            $data['is_free']=false;
        }
        if($request->is_physical==null)
        {
            $data['is_physical']=false;
        }
        $event->update($data);
        return redirect()->route('admin.event.list')->with('message','Event has been updated');

    }

    public function delete($id)
    {
        Event::where('id',$id)->delete();
        return redirect()->back()->with('message','Event has been deleted');
    }
}
