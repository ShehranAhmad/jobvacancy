<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiringCompany;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.setting');
    }

    public function topCompanies()
    {
        $companies=HiringCompany::all();
        return view('admin.logos.list',get_defined_vars());
    }
    public function topCompanyAdd()
    {
        return view('admin.logos.add');
    }

    public function topCompanyStore(Request $request)
    {

        $request->validate([
            'image'=>'mimes:jpeg,jpg,png|required'
        ]);
        $image=$request->image;
        $avatar = 'uploads/logos/'.time() . '.' . $image->getClientOriginalExtension();
        $movedFile = $image->move('uploads/logos/', $avatar);
        HiringCompany::create([
            'image'=>$avatar,
        ]);
        return redirect()->route('admin.setting.logos')->with('message','Company Logo has been created');
    }

    public function topCompanyDelete($id)
    {
        HiringCompany::where('id',$id)->delete();
        return redirect()->route('admin.setting.logos')->with('message','Company Logo has been deleted');


    }

    public function metaTags()
    {
        return view('admin.setting.meta_tags');
    }
    public function update(Request $request)
    {

        $setting = $request->except('_token');
        foreach ($setting as $key => $value) {
            if (empty($value))
                continue;
            $set = Setting::where('key', $key)->first() ?: new Setting();
            $set->key = $key;
            $set->value = $value;
            $set->save();

            if ($request->hasFile($key)) {
                $existing = Setting::where('key', '=', $key)->first();
                if ($existing) {
                    $ex_path = "uploads/cms/".$existing->setting;
                    if (File::exists($ex_path)) {
                        File::delete($ex_path);
                    }
                    $image = $request->file($key);
                    $name = $image->getClientOriginalName();
                    $image->move('uploads/cms/', $name);
                    Setting::where('key', '=', $key)->update([
                        'value' => "uploads/cms/".$name
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', 'The settings has been updated.');
    }
}
