<?php


namespace App\Repository\Contract;


use Illuminate\Http\Request;

interface ICourseRepository
{
    static public function getByIds(Request $request);

}
