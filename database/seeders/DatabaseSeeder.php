<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Department;
use App\Models\DeptCourse;
use App\Models\Faculty;
use App\Models\Fee;
use App\Models\Gss;
use App\Models\Lecturer;
use App\Models\Material;
use App\Models\Ref;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = new Admin();
        $admin->name = 'Super Admin';
        $admin->email = 'admin@example.com';
        $admin->password = Hash::make('password');
        $admin->save();

        $CoursePool = ['MAT', 'EDU', 'CSC', 'PHY', 'BUS', 'STAT', 'BIO', 'FRN', 'SOS', 'GRM', 'GEO', 'FEG', 'FAG', 'BUM', 'COM', 'SIM', 'POS'];

        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, count($CoursePool) - 1);
            $courseName = $CoursePool[$index];

            $course = new Course();
            $course->code = $courseName . ' 1' . rand(1, 5) . rand(1, 9);
            $course->credit = rand(1, 4);
            $course->semester = rand(1, 2);
            $course->save();
        }
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, count($CoursePool) - 1);
            $courseName = $CoursePool[$index];

            $course = new Course();
            $course->code = $courseName . ' 2' . rand(1, 5) . rand(1, 9);
            $course->credit = rand(1, 4);
            $course->semester = rand(1, 2);
            $course->save();
        }
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, count($CoursePool) - 1);
            $courseName = $CoursePool[$index];

            $course = new Course();
            $course->code = $courseName . ' 3' . rand(1, 5) . rand(1, 9);
            $course->credit = rand(1, 4);
            $course->semester = rand(1, 2);
            $course->save();
        }
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, count($CoursePool) - 1);
            $courseName = $CoursePool[$index];

            $course = new Course();
            $course->code = $courseName . ' 4' . rand(1, 5) . rand(1, 9);
            $course->credit = rand(1, 4);
            $course->semester = rand(1, 2);
            $course->save();
        }

        $gss = new Gss();

        $gss->code = 'GS 101';
        $gss->credit = 2;
        $gss->semester = 1;
        $gss->level = 1;
        $gss->save();

        $gss = new Gss();
        $gss->code = 'GS 102';
        $gss->credit = 2;
        $gss->semester = 2;
        $gss->level = 1;
        $gss->save();

        $gss = new Gss();
        $gss->code = 'GS 103';
        $gss->credit = 1;
        $gss->semester = 1;
        $gss->level = 1;
        $gss->save();

        $gss = new Gss();
        $gss->code = 'GS 104';
        $gss->credit = 1;
        $gss->semester = 2;
        $gss->level = 1;
        $gss->save();

        $gss = new Gss();
        $gss->code = 'GS 105';
        $gss->credit = 1;
        $gss->semester = 1;
        $gss->level = 1;
        $gss->save();

        $gss = new Gss();
        $gss->code = 'GS 106';
        $gss->credit = 1;
        $gss->semester = 2;
        $gss->level = 1;
        $gss->save();

        $gss = new Gss();
        $gss->code = 'GS 107';
        $gss->credit = 1;
        $gss->semester = 1;
        $gss->level = 1;
        $gss->save();
        $gss = new Gss();
        $gss->code = 'GS 109';
        $gss->credit = 1;
        $gss->semester = 1;
        $gss->level = 1;
        $gss->save();
        $gss = new Gss();
        $gss->code = 'GS 110';
        $gss->credit = 1;
        $gss->semester = 2;
        $gss->level = 1;
        $gss->save();
        
        $gss = new Gss();
        $gss->code = 'GS 301';
        $gss->credit = 1;
        $gss->semester = 1;
        $gss->level = 3;
        $gss->save();
        
        for ($i = 1; $i < 5; $i++) {
            $faculty = new Faculty();
            $faculty->name = 'Faculty ' . $i;
            $faculty->save();

            for ($j = 1; $j < 5; $j++) {
                $fee = new Fee();
                $fee->faculty_id = $faculty->id;
                $fee->amount = rand(25000, 100000);
                $fee->level = 1;
                $fee->save();
                $fee = new Fee();
                $fee->faculty_id = $faculty->id;
                $fee->amount = rand(25000, 100000);
                $fee->level = 2;
                $fee->save();
                $fee = new Fee();
                $fee->faculty_id = $faculty->id;
                $fee->amount = rand(25000, 100000);
                $fee->level = 3;
                $fee->save();
                $fee = new Fee();
                $fee->faculty_id = $faculty->id;
                $fee->amount = rand(25000, 100000);
                $fee->level = 4;
                $fee->save();


                $dept = new Department();
                $dept->name = 'Department ' . $j;
                $dept->faculty_id = $faculty->id;
                $dept->save();

                $dept->courses()->attach([
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                    ["course_id" => rand(1, 10), "level" => 1],
                    ["course_id" => rand(11, 20), "level" => 2],
                    ["course_id" => rand(21, 30), "level" => 3],
                    ["course_id" => rand(31, 40), "level" => 4],
                ]);
            }
        }

        User::factory()->create([
            'reg_no' => '1234567890',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'level' => 3,
            'year' => today()->subYears(3)
        ]);

        \App\Models\User::factory(50)->create();

        foreach (User::all() as $user) {

            $courses = $user->department->courses;
            $myC = [];
            $myGss = [];

            //Get all available courses for user level and department
            foreach ($courses as $course) {
                if ($user->level > $course->pivot->level) {
                    array_push($myC, ["course_id" => $course->id, "score" => rand(35, 99), "level" => $course->pivot->level]);
                }
            }
            $user->courses()->attach($myC);

                foreach (Gss::all() as $course) {
                    if ($user->level > $course->level) {
                        array_push($myGss, ["gss_id" => $course->id, "score" => rand(35, 99), "level" => $course->level]);
                    }
                }
                $user->gss()->attach($myGss);
            

            for ($i = 1; $i < $user->level; $i++) {
                $fee = Fee::where('faculty_id', $user->department->faculty_id)->where('level', $user->level)->first();

                $ref = new Ref();
                $ref->user_id = $user->id;
                $ref->fee_id = $fee->id;
                $ref->amount = $fee->amount;
                $ref->year = today()->subYears($user->level);
                $ref->rrr = Random::generate(12, '0-9');
                $ref->confirmed = true;
                $ref->save();
            }
        }
        
        Lecturer::factory()->create([
            'email' => 'lecturer@example.com',
        ]);


        \App\Models\Lecturer::factory(10)->create();

        foreach (Lecturer::all() as $lec) {
            $lec->courses()->attach([
                rand(1, 400),
                rand(1, 400),
                rand(1, 400),
                rand(1, 400),
            ]);
            foreach ($lec->courses as $course) {
                for ($i = 0; $i < 5; $i++) {
                    $material = new Material();
                    $material->name = fake()->sentence();
                    $material->lecturer_id = $lec->id;
                    $material->course_id = $course->id;
                    $material->save();
                }
            }
        }
    }
}
