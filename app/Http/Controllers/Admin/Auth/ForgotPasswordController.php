<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
   
    public function index() {

        return view('admin.auth.password.email');
    }

    public function forgotpasswordPost(Request $request) {
        $request->validate([
            'email'=>"required|email|exists:users"
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token'=> $token,
            'created_at'=> Carbon::now()
        ]);
        
        Mail::send("admin.emails.forget-password", ['token'=>$token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset pASSWORD");
        });
        return redirect(route("forgotPasswordAdmin"))->with("success", 'You have a sent email in your box');
    }
    

    public function resetpassword($token) {

        return view('admin.auth.password.reset_form_password', ['token'=>$token]);
    }
    public function resetpasswordpost(Request $request) {
        $request->validate([
            "email"=>"required|email|exists:users",
            "password"=>"required|string|min:6:confirmed",
            "confirm_password"=> "required"
        ]);

        $updatePassword = DB::table('password_resets')->where([
            "email"=> $request->email,
            "token"=>$request->token
        ] )->first();

    }
}
