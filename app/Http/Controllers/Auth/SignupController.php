<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('signup');
    }

    /**
     * Show the form for creating a new resource.
     */


    public function processSignup(Request $request)
    {
        // Customize error messages
        $messages = [
            'g-recaptcha-response.required' => 'The reCAPTCHA is required.',
            'g-recaptcha-response.recaptcha' => 'Invalid reCAPTCHA, please try again.',
        ];

        // Validate incoming request with the fields
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required|min:8|same:password',
            'g-recaptcha-response' => 'required|captcha', // 'captcha' rule provided by the package
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Create a new user instance
        $user = new User();
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);

        // Trigger the email verification process
        event(new Registered($user));

        // Return a response with the redirect URL to the verification notice page
        return response()->json([
            'status' => true,
            'message' => 'Signup successful! Please verify your email address.',
            'verification_url' => URL::temporarySignedRoute('verification.notice', now()->addMinutes(10)),
        ]);
    }

}
