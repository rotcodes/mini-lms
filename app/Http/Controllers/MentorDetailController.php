<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class MentorDetailController extends Controller
{
    public function index($mentorId)
    {
        // Fetch mentor's details using the user_id
        $instructor = Instructor::where('user_id', $mentorId)->first();

        // Check if the mentor exists
        if (!$instructor) {
            abort(404, 'Mentor not found');
        }

        // Use the instructor's actual ID to fetch their courses
        $instructorCourse = Course::where('instructor_id', $instructor->id)->get();

        // Return the view with the mentor's details and courses
        return view('mentor-detail', [
            'instructor' => $instructor,
            'instructorCourse' => $instructorCourse,
        ]);
    }
}
