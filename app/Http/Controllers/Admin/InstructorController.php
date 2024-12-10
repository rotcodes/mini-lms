<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = User::where('role_id', 2)->get();
        return view('admin.instructor.list', [
            'instructors' => $instructors
        ]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request with the fields from your instructor form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15|unique:instructors,phone',
            'skill' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Create User model instance
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => 2,
            'email_verified_at' => now(),
        ]);

        // Create a new instructor instance
        $instructor = new Instructor();
        $instructor->user_id = $user->id; // Link Instructor to User
        $instructor->phone = $request->input('phone');
        $instructor->skill = $request->input('skill');
        $instructor->country = $request->input('country');
        $instructor->city = $request->input('city');
        $instructor->address = $request->input('address');
        $instructor->instagram = $request->input('instagram');
        $instructor->facebook = $request->input('facebook');
        $instructor->twitter = $request->input('twitter');
        $instructor->description = $request->input('description');

        // Handle the uploaded image if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'instructor-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/instructors/'), $imageName);

        }

        // Save image name in database
        $instructor->image = $imageName;

        // Save the instructor to the database
        $instructor->save();

        // Flash success message
        session()->flash('success', 'Instructor added successfully!');

        // Return a JSON response
        return response()->json([
            'status' => true,
            'message' => 'Instructor created successfully!',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the user with the associated instructor data
        $user = User::with('instructor')->findOrFail($id);

        return view('admin.instructor.edit', [
            'instructor' => $user  // Pass the User instance to the view
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the user by ID (the ID being passed is the user ID, not the instructor ID)
        $user = User::with('instructor')->findOrFail($id);

        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id, // Unique check excluding the current user
            'password' => 'nullable|string|min:8', // Password is optional on update
            'phone' => 'required|string|max:15|unique:instructors,phone,' . optional($user->instructor)->id, // Unique check for phone, exclude current instructor if exists
            'skill' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        // Update instructor details if instructor record exists
        $instructor = $user->instructor;

        if ($instructor) {
            $instructor->phone = $request->input('phone');
            $instructor->skill = $request->input('skill');
            $instructor->country = $request->input('country');
            $instructor->city = $request->input('city');
            $instructor->address = $request->input('address');
            $instructor->instagram = $request->input('instagram');
            $instructor->facebook = $request->input('facebook');
            $instructor->twitter = $request->input('twitter');
            $instructor->description = $request->input('description');

            // Handle the uploaded image if present
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($instructor->image && file_exists(public_path('uploads/instructors/' . $instructor->image))) {
                    unlink(public_path('uploads/instructors/' . $instructor->image));
                }

                // Store the new image
                $image = $request->file('image');
                $imageName = 'instructor-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/instructors/'), $imageName);

                $instructor->image = $imageName;
            }

            // Save the updated instructor
            $instructor->save();
        }

        session()->flash('success', 'Instructor updated successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Instructor updated successfully!',
        ]);
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID (assuming the passed ID is a User ID)
        $user = User::with('instructor')->findOrFail($id);

        // Check if the user has an associated instructor
        $instructor = $user->instructor;

        if ($instructor) {
            // Delete the instructor image if it exists
            if ($instructor->image && file_exists(public_path('uploads/instructors/' . $instructor->image))) {
                unlink(public_path('uploads/instructors/' . $instructor->image));
            }

            // Delete the instructor
            $instructor->delete();
        }

        // Delete the user
        $user->delete();

        session()->flash('success', 'Instructor and associated user deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Instructor and associated user deleted successfully!',
        ]);
    }


}
