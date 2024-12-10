<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $courses = Course::all();
        $latestCourses = $courses->sortByDesc('created_at')->take(4);
        $instructors = User::where('role_id', 2)->get();
        return view('home',[
            'categories' => $categories,
            'courses' => $courses,
            'latestCourses' => $latestCourses,
            'instructors' => $instructors,
        ]);
    }
}
