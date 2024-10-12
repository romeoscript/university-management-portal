<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function addAllCourses(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $myC = [];
        $dc = new DashboardController();
        $dc->getUserCourses();

        //Get all available courses for user level and department
        foreach ($dc->getUserCourses()['selectedCourses'] as $course) {
            array_push($myC, ["course_id" => $course->id, "level" => $user->level]);
        }
        $user->courses()->attach($myC);

        return redirect()->back()->with('success', 'Courses have been added successfully.');
    }

    public function deleteCourse($id)
    {
        $user = User::find(auth()->user()->id);
        $user->courses()->detach($id);

        return redirect()->back()->with('success', 'Course have been deleted.');
    }
}
