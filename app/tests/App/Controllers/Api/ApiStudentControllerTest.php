<?php

namespace Tests\App\Controllers\Api;


class  ApiStudentControllerTest extends \Tests\TestCase
{
    public function testgetStudent()
    {
        //Check by year
        $student = $this->get(route('student', ['age' => 18]));
        foreach ($student->response->json()['data'] as ['age' => $age]) {
            $this->assertTrue($age === 18);
        }
        //Check by year
        $student = $this->get(route('student', ['age' => 19]));
        foreach ($student->response->json()['data'] as ['age' => $age]) {
            $this->assertTrue($age === 19);
        }
        //Checking by gender
        $student = $this->get(route('student', ['gender' => 'male']));
        foreach ($student->response->json()['data'] as ['gender' => $gender]) {
            $this->assertTrue($gender === 'male');
        }
        //Checking by gender
        $student = $this->get(route('student', ['gender' => 'female']));
        foreach ($student->response->json()['data'] as ['gender' => $gender]) {
            $this->assertTrue($gender === 'female');
        }
        // Check by gender and year
        $age_student = 18;
        $gender_student = 'male';
        $student = $this->get(route('student', ['gender' => $gender_student, 'age' => $age_student]));
        foreach ($student->response->json()['data'] as ['gender' => $gender, 'age' => $age]) {
            $this->assertTrue($gender === 'male');
            $this->assertTrue($age === 18);
        }
        // Check by gender and year
        $age_student = 22;
        $gender_student = 'female';
        $student = $this->get(route('student', ['gender' => $gender_student, 'age' => $age_student]));
        foreach ($student->response->json()['data'] as ['gender' => $gender, 'age' => $age]) {
            $this->assertTrue($gender === $gender_student);
            $this->assertTrue($age === $age_student);
        }

    }

    public function testgetCourse()
    {
        // Checking one id
        $ids = '2';
        $ids_check = (int) $ids;
        $courses = $this->get(route('course', ['id' => $ids]))->response->json();
        [['id' =>  $id]] = $courses;
        $this->assertTrue($ids_check === (int) $id);

        // Check for multiple IDs
        $ids = '23, 11';
        $ids_array = array_map('trim', explode(',', $ids));
        sort($ids_array);
        $courses = $this->get(route('course', ['id' => $ids]))->response->json();
        foreach ($courses as ['id' => $id]) {
            $this->assertTrue((int)$id === (int) current($ids_array));
            next($ids_array);
        }

    }

}
