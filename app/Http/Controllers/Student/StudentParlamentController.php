<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentParlament;
use App\Models\Student\StudentParlamentMainContent;

use Illuminate\Http\Request;

class StudentParlamentController extends Controller
{

    public function index(string $locale, Request $request)
    {
        $locale = $request->get('locale', app()->getLocale());

        $mainContent = StudentParlamentMainContent::first()->{'content_' . $locale};
        $students = StudentParlament::where('status', 1)
            ->orderBy('sort')
            ->get();

        return view('student.parlament.index', compact('students', 'locale', 'mainContent'));
    }
}
