<?php


namespace App\Repository\Contract;


use Illuminate\Http\Request;

interface IStudentRepository
{
    static public function getByGenderAndAge(Request $request);

}
