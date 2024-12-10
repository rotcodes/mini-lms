<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('student.profile');
    }

    public function profileUpdate(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::user()->id;

        // Check if a student record already exists for the user
        $studentExists = Student::where('user_id', $userId)->exists();

        // Define validation rules with conditional 'image' requirement
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'sometimes|email|unique:users,email,' . $userId,
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'image' => ($studentExists ? 'sometimes' : 'required') . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Conditionally required
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Update User model if name, email, or password are present in the request
        $user = User::find($userId);
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        // Ensure a student record exists for the user
        $student = Student::firstOrCreate(
            ['user_id' => $userId],
            ['phone' => $request->input('phone'), 'country' => $request->input('country'), 'city' => $request->input('city'), 'address' => $request->input('address')]
        );

        // Update existing student fields with new values
        $student->phone = $request->input('phone');
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->address = $request->input('address');

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($student->image && file_exists(public_path('uploads/students/' . $student->image))) {
                unlink(public_path('uploads/students/' . $student->image));
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/students/'), $imageName);

            // Update the student's image field
            $student->image = $imageName;
        }

        // Save the updated student
        $student->save();

        session()->flash('success', 'Profile updated successfully!');

        // Return a successful JSON response
        return response()->json([
            'status' => true,
            'message' => 'Student updated successfully!',
        ]);
    }



}
