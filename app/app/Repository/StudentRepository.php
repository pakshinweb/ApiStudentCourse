<?php


namespace App\Repository;


use App\Models\Student;
use App\Repository\Contract\IRepository;
use Illuminate\Http\Request;

class StudentRepository implements IRepository
{

    static public function getAll( $request)
    {
        $student = Student::orderBy('created_at', 'desc');
        foreach ($request->all() as $input => $item) {
            if ($input == 'age') $student->where('age', $item);
            if ($input == 'gender') $student->where('gender', $item);
        }

        return $student->get();
    }
}
