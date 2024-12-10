<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{
    public function index($courseSlug)
    {
        // Fetch course details from the database based on the provided slug
        $course = Course::where('slug', $courseSlug)->firstOrFail();

        $similarCourses = Course::where('category_id', $course->category_id)
        ->where('id', '!=', $course->id) // Exclude the current course
        ->take(5) // Limit the number of similar courses
        ->get();

        // Split description by new lines
        $descriptionLines = preg_split('/\r\n|\r|\n/', $course->desc);


        return view('course-details', [
            'course' => $course,
            'descriptionLines' => $descriptionLines,
            'similarCourses' => $similarCourses,
        ]);
    }

}
