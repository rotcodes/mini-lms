<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public function index(){
        // Get all orders where the user_id matches the authenticated user's ID, and return them as a collection.
        $user = Auth::user();
        $myCourses = Order::where('user_id', $user->id)->get();

        return view('student.my-courses',[
            'myCourses' => $myCourses,
        ]);
    }
}
