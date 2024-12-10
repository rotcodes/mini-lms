<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListInstructorsController extends Controller
{
    public function index(){
        // Fetch instructors from the database
        $instructors = User::where('role_id', 2)->get();

        // Pass the instructors to the view
        return view('admin.list-instructors', [
            'instructors' => $instructors,
        ]);
    }
}
