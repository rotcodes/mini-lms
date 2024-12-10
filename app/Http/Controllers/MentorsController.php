<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function index()
    {
        // Fetch all mentors from the database
        $instructors = Instructor::paginate(6); // Fetch 10 mentors per page
        // Pass the fetched mentors to the view
        return view('mentors', compact('instructors'));
    }
}
