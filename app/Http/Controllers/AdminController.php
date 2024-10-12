<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{    
    public function show()
    {
        $stat['users'] = User::count();
        $stat['lecturers'] = Lecturer::count();
        $stat['faculties'] = Faculty::count();
        $stat['departments'] = Department::count();
        $lecturers = Lecturer::latest()->take(5)->get();
        $users = User::latest()->take(5)->get();
        return view('admin.dashboard', compact('stat','lecturers', 'users'));
    }
    
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    
    public function lecturers()
    {
        $lecturers = Lecturer::all();
        return view('admin.lecturers', compact('lecturers'));
    }
    
    public function faculties()
    {
        $faculties = Faculty::all();
        return view('admin.faculties', compact('faculties'));
    }
}
