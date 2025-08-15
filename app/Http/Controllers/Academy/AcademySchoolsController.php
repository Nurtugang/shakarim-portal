<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;

class AcademySchoolsController extends Controller
{
    public function index()
    {
        return view('academy.schools.index');
    }
}
