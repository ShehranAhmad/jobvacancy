<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function joinWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(Request $request)
    {



        $get_user = Socialite::driver('google')->stateLess()->user();


        $user  =  User::where(['email' => $get_user->getEmail()])->first();
        $link=$get_user->getAvatar();
        $filename='uploads/users/user.png';
        if($link!="")
        {
            try
            {
                $filename = "uploads/users/".time().".jpg";
                file_put_contents(
                    $filename,
                    file_get_contents($link)
                );
            }
            catch (\Exception $e)
            {
                $error = $e->getMessage();

                return redirect()->route('dashboard')->with('error','Whoops Error in your Image.');
            }
        }
        $name=$get_user->getName();
     //   $split = explode(" ", $get_user->getName());
     //   $firstname = array_shift($split);
     //   $lastname  = implode(" ", $split);

        if (!$user)
        {
            $user = User::Create([
                'name'        => $name,
              //  'last_name'         => $lastname,
                'email'             => $get_user->getEmail(),
                'password'          => bcrypt(Str::random(8)),
                'auth_provider'     => 'google',
                'avatar'            => $filename,
                'role'              => 'employee',
                'slug'=>Str::slug($name,'-').'-'.Carbon::now()->format('dmyHi'),
            ]);
                EmployeeDetail::create([
                    'user_id'=>$user->id,
                ]);

            Auth::login($user);
            return redirect()->route('dashboard');

        }
        else
        {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

    }

}
