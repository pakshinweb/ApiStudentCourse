<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    const GENDER_M = 'male';
    const GENDER_F = 'female';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'gender',
    ];

    /**
     * Get the courses for the student.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

}
