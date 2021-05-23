<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\FollowCompany;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
       return view('user.dashboard');
   }

   public function favorites()
   {
       $favorites=Favorite::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->paginate(15);
        return view('user.favorite-jobs',get_defined_vars());
   }

   public function removeFavorites($id)
   {
       Favorite::where('id',$id)->delete();
       return redirect()->back()->with('success','Job has been removed from Favorites');
   }

   public function follow()
   {
       $follow=FollowCompany::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->paginate(30);
       return view('user.follow',get_defined_vars());
   }
}
