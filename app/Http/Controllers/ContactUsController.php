<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        return view('contact-us');
    }

    function handleContactForm(Request $request)
    {
        $data = $request->only(['name', 'email', 'subject', 'message', 'checkbox']);

        // Check for required fields
        if (empty($data['name'])) {
            return response()->json(['status' => false, 'message' => 'Name is required']);
        }

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return response()->json(['status' => false, 'message' => 'Valid email is required']);
        }

        if (empty($data['subject'])) {
            return response()->json(['status' => false, 'message' => 'Subject is required']);
        }

        if (empty($data['message'])) {
            return response()->json(['status' => false, 'message' => 'Message is required']);
        }

        if (empty($data['checkbox']) || $data['checkbox'] != 1) {
            return response()->json(['status' => false, 'message' => 'You must agree to the Terms & Conditions']);
        }

        // Simulate success
        return response()->json(['status' => true, 'message' => 'Message sent successfully']);
    }
}
