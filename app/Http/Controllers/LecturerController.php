<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function show()
    {
        $user = auth('lecturer')->user();
        
        $stat['courses'] = $user->courses->count();
        $stat['materials'] = $user->materials->count();
        $stat['department'] = $user->department->name;
        $materials = $user->materials;
        $courses = $user->courses;

        return view('lecturer.dashboard', compact('stat','courses', 'materials'));
    }
    
    // public function users()
    // {
    //     $users = User::all();
    //     return view('lecturer.users', compact('users'));
    // }
    
}
