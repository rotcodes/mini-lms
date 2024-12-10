<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseLabels = CourseLabel::all();
        return view('admin.course_label.list', [
            'courseLabels' => $courseLabels // Correct way
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Create a new course instance
        $courseLabel = new CourseLabel();
        $courseLabel->name = $request->input('label'); // Get validated name input

        // Save the course to the database
        $courseLabel->save();

        session()->flash('success', 'Course Label created successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Course Label created successfully!',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:255|unique:course_labels,name,'.$id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Find the courseLabel
        $courseLabel = CourseLabel::findOrFail($id);
        $courseLabel->name = $request->input('label'); // Get validated name input

        // Save the courseLabel to the database
        $courseLabel->save();

        session()->flash('success', 'Course Label updated successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Course Label updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id)
     {
         // Find the category
         $courseLabel = CourseLabel::findOrFail($id);

         // Delete the category
         $courseLabel->delete();

         session()->flash('success', 'Course Label deleted successfully!');

         return response()->json([
             'status' => true,
             'message' => 'Course Label deleted successfully!',
         ]);
     }
}
