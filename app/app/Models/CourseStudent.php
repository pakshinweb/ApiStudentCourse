<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseStudent extends Pivot
{
    use HasFactory;


    public function course()
    {
        return $this->hasOne(Course::class, 'id','course_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id','student_id');
    }


}
