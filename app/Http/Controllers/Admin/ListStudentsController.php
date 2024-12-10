<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListStudentsController extends Controller
{
    public function index(){
        $students = User::where('role_id', 3)->get();
        return view('admin.list-students', compact('students'));
    }
}
