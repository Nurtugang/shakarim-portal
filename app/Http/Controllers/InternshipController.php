<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Internship;

class InternshipController extends Controller
{
    public function index()
    {
        $internshipsByFaculty = Internship::with('faculty')
                                ->get()
                                ->groupBy('faculty_id');

        return view('internship.index', compact('internshipsByFaculty'));
    }
}