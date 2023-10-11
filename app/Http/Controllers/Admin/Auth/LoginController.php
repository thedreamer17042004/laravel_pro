<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        if ($user) {
            foreach ($user->roles as $role) {
                //
                $role_id = $role->id;
            }
            if (Auth::id() > 0 && $role_id == 1) {
                return redirect()->route('admin.dashboard');
            }
        }else {
            return view('admin.auth.login');

        }



    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);


        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            $user_role = auth()->user();
            foreach ($user_role->roles as $role) {
                $role_id = $role->id;
            }

            // if ($role_id == 1) {

            //     $request->session()->regenerate();

            //     return redirect()->route('admin.dashboard')->with('logined', 'Logined success!!');
            // } else {

            //     return redirect()->route('loginAdmin')->with('message', 'You are not authorized!!');
            // }
            if ($role_id) {

                $request->session()->regenerate();

                return redirect()->route('admin.dashboard')->with('logined', 'Logined success!!');
            } else {

                return redirect()->route('loginAdmin')->with('message', 'You are not authorized!!');
            }
        }



        return back()->with([
            'emailNotify' => 'The provided credentials do not match our records.',
        ]);
    }
}
