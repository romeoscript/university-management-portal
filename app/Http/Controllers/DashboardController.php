<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Gss;
use App\Models\Material;
use App\Models\Ref;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Nette\Utils\Random;

class DashboardController extends Controller
{
    public function getUserCourses(): array
    {
        //Get User
        $user = auth()->user();

        $courses = $user->department->courses;
        $selectedCourses = [];
        $regCourses = [];

        // //Get all available courses for user level and department
        foreach ($courses as $course) {
            if ($user->level >= $course->pivot->level) {
                $registered = $user->courses->where('id', $course->id)->first();

                // Get courses that haven't been registered before
                if (!$registered)
                    // Add to selected courses
                    array_push($selectedCourses, $course);
                else {
                    // Get carried over courses for new registration
                    if ($registered->pivot->score < 39 && $registered->pivot->score != 0) {

                        // Check if carry over have been registered again
                        foreach ($user->courses->where('id', $course->id) as $cur) {
                            $empty = true;
                            if ($cur->pivot->level == $user->level)
                                $empty = false;
                        }

                        // Add attribute to show course as carry over.                    
                        if ($empty) {
                            $course['type'] = 'co';
                            // Add to selected courses
                            array_push($selectedCourses, $course);
                        }
                    } else {
                        $course['iid'] = $course->id;
                        array_push($regCourses, $course);
                    }
                }
            }
        }
        $data = ['selectedCourses' => $selectedCourses, 'regCourses' => $regCourses];
        return $data;
    }

    private function getUserRegisteredCourses()
    {
        $user = auth()->user();

        $courses = $user->courses;
        $selectedCourses = [];

        foreach ($courses as $course) {

            if ($course->pivot->level == $user->level) {
                array_push($selectedCourses, $course);
            }
        }

        return $selectedCourses;
    }

    public function grade(int $score): string
    {
        if ($score < 39)
            return 'F';
        else if ($score > 39 && $score < 45)
            return 'E';
        else if ($score > 45 && $score < 50)
            return 'D';
        else if ($score > 50 && $score < 60)
            return 'C';
        else if ($score > 60 && $score < 70)
            return 'B';
        else {
            return 'A';
        }
    }

    public function cgpa(int $level)
    {
        $user = auth()->user();
        $courses = $user->courses;

        $totalCredit = [];

        foreach ($courses as $course) {

            if ($course->pivot->level < $user->level) {
                if ($course->pivot->level == $level) {
                    if ($course->pivot->score < 39)
                        $count = 0;
                    else if ($course->pivot->score > 39 && $course->pivot->score < 45)
                        $count = 1;
                    else if ($course->pivot->score > 45 && $course->pivot->score < 50)
                        $count = 2;
                    else if ($course->pivot->score > 50 && $course->pivot->score < 60)
                        $count = 3;
                    else if ($course->pivot->score > 60 && $course->pivot->score < 70)
                        $count = 4;
                    else {
                        $count = 5;
                    }
                    $course['cgpa'] = $count * (int) $course->credit;
                }
                array_push($totalCredit, $course);
            }
        }

        $cgpa = collect($totalCredit)->sum('cgpa');
        $cgpa = $cgpa / collect($totalCredit)->count();
        return round($cgpa, 2);
    }

    public function courses()
    {
        $allCourses = $this->getUserCourses()['selectedCourses'];
        $registered = $this->getUserRegisteredCourses();
        return view('courses', compact('allCourses', 'registered'));
    }

    public function fees()
    {
        $pending = Ref::where('user_id', auth()->user()->id)->where('confirmed', false)->get();
        
        return view('fees', compact('pending'));
    }

    public function lectures()
    {
        $materials = [];
        foreach ($this->getUserCourses()['regCourses'] as $course) {
            $mat = Material::where('course_id', $course['iid'])->first();
            if ($mat) {
                array_push($materials, $mat);
            }
        }
        return view('lectures', compact('materials'));
    }

    public function results()
    {
        $user = auth()->user();
        $courses = $user->courses;

        $selectedCourses = [];

        foreach ($courses as $course) {

            if ($course->pivot->level < $user->level) {
                array_push($selectedCourses, $course);
            }
        }
        $courses = $selectedCourses;
        return view('results', compact('courses'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function generateRef(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (Ref::where('user_id',$user->id)->where('year',Carbon::parse($request->year))->first()) {
            return redirect()->back()->with('success', 'Ref have been generated before.');
        }
        $level = Carbon::parse($request->year)->diffInYears($user->year);

        $fee = Fee::where('faculty_id', $user->department->faculty_id)->where('level', $level)->first();

        $ref = new Ref();
        $ref->user_id = $user->id;
        $ref->fee_id = $fee->id;
        $ref->amount = $fee->amount;
        $ref->year = Carbon::parse($request->year);
        $ref->rrr = Random::generate(12, '0-9');
        $ref->save();

        return redirect()->back()->with('success', 'Ref have been generated successfully.');
    }

    public function sgs()
    {
        $gss = Gss::all();
        return view('sgs', compact('gss'));
    }
}
