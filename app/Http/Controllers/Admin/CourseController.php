<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLabel;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load instructor and user relationship
        $courses = Course::with('instructor.user')->get();
        return view('admin.course.list',[
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $labels = CourseLabel::all();

        // Get only instructors whose associated user has role_id = 2
        $instructors = Instructor::whereHas('user', function($query) {
            $query->where('role_id', 2);
        })->with('user')->get();

        return view('admin.course.create', [
            'categories' => $categories,
            'instructors' => $instructors,
            'labels' => $labels
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request with the fields from your course form
        $validator = Validator::make($request->all(), [
            'courseTitle' => 'required|string|max:255',
            'courseCategory' => 'required|exists:categories,id', // Validate that category ID exists in categories table
            'instructor' => 'required|exists:instructors,id', // Validate that the instructor ID exists in instructors table
            'courseLabel' => 'required',
            'price' => 'required|numeric|min:0', // Validate that price is a number and greater than or equal to zero
            'courseDuration' => 'required|regex:/^\d{2}:\d{2}:\d{2}$/', // Validate that duration matches hh:mm:ss format
            'overview' => 'required|string',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Create a new course instance
        $course = new Course();
        $course->courseTitle = $request->input('courseTitle');
        $course->category_id = $request->input('courseCategory'); // Save the category ID
        $course->instructor_id = $request->input('instructor'); // Assuming instructor is the ID reference
        $course->label_id = $request->input('courseLabel');
        $course->price = $request->input('price');
        $course->courseDuration = $request->input('courseDuration');
        $course->overview = $request->input('overview');
        $course->desc = $request->input('desc');

        // Handle the uploaded image if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'course-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/course/'), $imageName);

            // Save image name in database
            $course->image = $imageName;
        }

        // Save the course to the database
        $course->save();

        // Flash success message
        session()->flash('success', 'Course created successfully!');

        // Return a JSON response
        return response()->json([
            'status' => true,
            'message' => 'Course created successfully!',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $labels = CourseLabel::all();

        // Eager load course with instructor and user details
        $course = Course::with('instructor.user')->findOrFail($id);

        // Retrieve only instructors with associated users having role_id = 3
        $instructors = Instructor::whereHas('user', function($query) {
            $query->where('role_id', 2);
        })->with('user')->get();

        return view('admin.course.edit', [
            'categories' => $categories,
            'instructors' => $instructors,
            'course' => $course,
            'labels' => $labels
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request with the fields from your course form
        $validator = Validator::make($request->all(), [
            'courseTitle' => 'required|string|max:255',
            'courseCategory' => 'required|exists:categories,id', // Validate that category ID exists in categories table
            'instructor' => 'required|exists:instructors,id',
            'courseLabel' => 'required|exists:course_labels,id', // Validate that courseLabel ID exists in course_labels table
            'price' => 'required|numeric|min:0', // Validate that price is a number and greater than or equal to zero
            'courseDuration' => 'required|regex:/^\d{2}:\d{2}:\d{2}$/', // Validate that duration matches hh:mm:ss format
            'overview' => 'required|string',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg', // Image is optional, use `nullable` for edit
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Find the course by ID
        $course = Course::findOrFail($id);

        // Update course properties with new data
        $course->courseTitle = $request->input('courseTitle');
        $course->category_id = $request->input('courseCategory'); // Save the category ID
        $course->instructor_id = $request->input('instructor'); // Assuming instructor is the ID reference
        $course->label_id = $request->input('courseLabel');
        $course->price = $request->input('price');
        $course->courseDuration = $request->input('courseDuration');
        $course->overview = $request->input('overview');
        $course->desc = $request->input('desc');

        // Handle the uploaded image if present
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($course->image) {
                $oldImagePath = public_path('uploads/course/' . $course->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = 'course-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/course/'), $imageName);

            // Save new image name in database
            $course->image = $imageName;
        }

        // Save the updated course to the database
        $course->save();

        // Flash success message
        session()->flash('success', 'Course updated successfully!');

        // Return a JSON response
        return response()->json([
            'status' => true,
            'message' => 'Course updated successfully!',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category
        $course = Course::findOrFail($id);

        // Delete the category
        $course->delete();

        session()->flash('success', 'Course deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Course deleted successfully!',
        ]);
    }
}
