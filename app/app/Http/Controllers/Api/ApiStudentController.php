<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;


class ApiStudentController extends Controller
{

    public function getStudent(Request $request)
    {
         $students = Student::with('courses');
         $arguments = [
             'age',
             'gender',
         ];
         foreach ($arguments as $argument) {
             if ($request->has($argument)) $students->where($argument, $request->input($argument));
         }
        return $students->paginate(2);
    }

    public function getCourse(Request $request) {
        if (empty($request->input('id'))) {
            return Student::with('courses')
                ->paginate(2);
        } else {
            $ids = explode(',', $request->input('id'));
            return Student::with('courses')
                    ->whereIn('id', $ids)
                    ->get();
        }
    }

}
