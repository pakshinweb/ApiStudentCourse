<?php

namespace App\Http\Controllers\Api;


use App\Repository\StudentRepository;
use App\Repository\CourseRepository;
use Illuminate\Http\Request;

class ApiStudentController extends \App\Http\Controllers\Controller
{

    public function getStudent(Request $request)
    {
        return StudentRepository::getByGenderAndAge($request);
    }

    public function getCourse(Request $request) {
        return CourseRepository::getByIds($request);
    }

}
