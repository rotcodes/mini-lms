<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('forget-password');
    }

    public function processForgotPassword(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('forgetPassword')->withInput()->withErrors($validator);
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->where('email',$request->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send Reset Email here
        $user = User::where('email',$request->email)->first();
        $mailData =  [
            'token' => $token,
            'user' => $user,
            'subject' => 'Forget password request.'
        ];

        Mail::to($request->email)->send(new ResetPasswordEmail($mailData));

        return redirect()->route('forgetPassword')->with('success','Reset password email has been sent to your email inbox.');

    }

    public function resetPassword(Request $request, $tokenString)
    {
        // Check if the token is valid
        $token = DB::table('password_reset_tokens')->where('token', $tokenString)->first();

        if ($token == null || Carbon::parse($token->created_at)->addMinutes(30)->isPast()) {
            return redirect()->route('forgetPassword')->with('error', 'This password reset link has expired or is invalid.');
        }

        // Return the reset password view
        return view('reset-password', [
            'tokenString' => $tokenString
        ]);
    }

    public function processResetPassword(Request $request) {

        $token = DB::table('password_reset_tokens')->where('token',$request->token)->first();

        if ($token == null){
            return redirect()->route('forgetPassword')->with('error', 'This password reset link has expired or is invalid.');
        }

        $validator = Validator::make($request->all(),[
            'new_password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('resetPassword',$request->token)->withErrors($validator);
        }

        User::where('email',$token->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // Delete the token from the database to invalidate it
        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        return redirect()->route('login')->with('success','You have successfully changed your password.');

    }

}
