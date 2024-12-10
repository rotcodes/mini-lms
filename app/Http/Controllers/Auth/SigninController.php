<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('signin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function processLogin(Request $request)
    {
        // Custom error messages for reCAPTCHA
        $messages = [
            'g-recaptcha-response.required' => 'The reCAPTCHA is required.',
            'g-recaptcha-response.captcha' => 'Invalid reCAPTCHA, please try again.',
        ];

        // Validate request, including reCAPTCHA
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], $messages);

        if ($validator->passes()){

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('admin.dashboard')->with('success', 'Successfully Logged in');
            } else {
                return redirect()->route('login')->withInput($request->only('email'))->with('error', 'These credentials do not match our records.');
            }

        } else {
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
