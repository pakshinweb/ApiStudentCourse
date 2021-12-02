<?php


namespace App\Repository;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Repository\Contract\ICourseRepository;

class CourseRepository implements ICourseRepository
{
    static public function getByIds(Request $request) {
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
