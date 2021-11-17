<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $count_student = 1000;

        for ($i = 0; $i < $count_student; $i++) {
            Student::factory()
                ->create();
        }

        $student = collect()->range(1,$count_student);
        for ($i = 0; $i < 20; $i++) {
            $course = Course::factory()
                ->create();
            $course->students()->sync($student->random(rand(1,$count_student))->all());
        }

    }
}
