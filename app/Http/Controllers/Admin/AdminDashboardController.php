<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch instructors (role_id == 2)
        $instructors = User::where('role_id', 2)->get();

        // Fetch students (role_id == 3)
        $students = User::where('role_id', 3)->get();

        // Fetch all courses
        $courses = Course::all();

        // Count all users excluding admins (overall registrations without role_id == 1)
        $overallRegistrations = User::where('role_id', '!=', 1)->count();
        return view('admin.dashboard',[
            'instructors' => $instructors,
            'students' => $students,
            'courses' => $courses,
            'overallRegistrations' => $overallRegistrations,
        ]);
    }
}
