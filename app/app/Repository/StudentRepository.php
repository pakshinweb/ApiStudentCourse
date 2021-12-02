<?php


namespace App\Repository;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Repository\Contract\IStudentRepository;

class StudentRepository implements IStudentRepository
{
    static public function getByGenderAndAge(Request $request) {
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

}
