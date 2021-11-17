<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiStudentController extends Controller
{

    public function getStudent(Request $request)
    {

         $students = Student::with('courses');
         if (empty($request->input('age')) && empty($request->input('gender'))) {
             return $students->paginate(2);
         } else {
             foreach ($request->all() as $k => $item) {
                 $students->where($k, $item);
             }
             return $students->paginate(2);
         }

    }

    public function getCourse(Request $request) {
        if (empty($request->input('id'))) {
            return Student::with('courses')
                ->paginate(2);
        } else {
            $ids = explode(',', $request->input('id'));

                $result = Student::with('courses')
                    ->whereIn('id', $ids)
                    ->get();

            return $result;
        }
    }

}