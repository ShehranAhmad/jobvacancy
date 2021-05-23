<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $role=auth()->user()->role;
            if ($role=='admin')
            {
                return redirect()->route('admin.dashboard');
            }
            if ($role=='manager')
            {

            }
            if ($role=='company')
            {

            }
            if ($role=='employee')
            {
                return redirect()->route('employee.dashboard');
               // return view('user.dashboard');
            }
            return redirect()->route('index');
        }
    }

    public function forgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user)
        {
            //so we can have dependency
            $password_broker = app(PasswordBroker::class);
            //create reset password token
            $token = $password_broker->createToken($user);
            DB::table('password_resets')->insert(['email' => $user->email, 'token' => $token, 'created_at' => new Carbon]);
            $url = url('reset-password') . '/' . $token . '?email=' .$request->email;
            // dd($url);
            $subject='Reset Password Notification.';
            $view='email.reset_password';
            sendMail([
                'view' => $view,
                'to' => $user->email,
                'subject' =>$subject,
                'name' => $user->name,
                'data' => ['url'=>$url,'user'=>$user

                ]
            ]);
            return back()->with('status','Link has been sent to your email');
        }

        else{
            return back()->withErrors(['email' => 'Whoops your email is wrong']);
        }
    }
}
