<?php

namespace Tests;


abstract class TestCase extends \Laravel\Lumen\Testing\TestCase
{


//    protected $student;
//
//    public function setUp(): void
//    {
//        parent::setUp();
//
//        $this->student = Student::with('courses')->get();
//    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
