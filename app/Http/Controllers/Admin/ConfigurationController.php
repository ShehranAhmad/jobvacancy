<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function categoryList()
    {
        $categories=Category::all();
        return view('admin.category.list',get_defined_vars());
    }

    public function categoryAdd()
    {
        return view('admin.category.add');
    }

    public function categoryEdit($id)
    {
        $category=Category::where('id',$id)->first();
        return view('admin.category.edit',get_defined_vars());
    }

    public function categoryStore(Request $request)
    {
        $request->validate(['name'=>'required']);
        Category::create(['name'=>$request->name]);
        return redirect()->route('admin.category')->with('message','Category has been created');
    }

    public function categoryUpdate(Request $request)
    {
        $request->validate(['name'=>'required']);
        Category::where('id',$request->id)->update(['name'=>$request->name]);
        return redirect()->route('admin.category')->with('message','Category has been updated');

    }

    public function categoryDelete($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('admin.category')->with('message','Category has been deleted');

    }

    public function skillList()
    {

        $skills=Skill::with('category')->get()->sortByDesc('category.name');

        return view('admin.skill.list',get_defined_vars());
    }

    public function skillAdd()
    {
        $categories=Category::all();
        return view('admin.skill.add',get_defined_vars());
    }

    public function skillEdit($id)
    {
        $skill=Skill::where('id',$id)->first();
        $categories=Category::all();
        return view('admin.skill.edit',get_defined_vars());
    }


    public function skillStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
        ]);
        Skill::create($request->all());
        return redirect()->route('admin.skill')->with('message','Job skill has been added');
    }

    public function skillUpdate(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
        ]);
        Skill::where('id',$request->id)->update($request->except('_token'));
        return redirect()->route('admin.skill')->with('message','Job skill has been updated');
    }

    public function skillDelete($id)
    {
        Skill::where('id',$id)->delete();
        return redirect()->route('admin.skill')->with('message','Skill has been deleted');

    }

    public function findSkill(Request $request)
    {
        $skills=Skill::where('category_id',$request->category_id)->get();
        $html=view('_partial.admin.skills', get_defined_vars())->render();

        return response()->json(['success'=>'Record found','html'=>$html]);
    }
}
