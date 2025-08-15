<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\BestTeacher;
use App\Models\Faculty;

class BestTeacherController extends Controller
{
    public function index()
    {
        $bestTeachers = BestTeacher::with(['faculty', 'department'])
            ->orderBy('faculty_id')
            ->orderBy('year', 'desc')
            ->get()
            ->groupBy('faculty_id');

        $faculties = Faculty::whereIn('id', $bestTeachers->keys())
            ->orderBy('sort')
            ->get()
            ->keyBy('id');

        return view('science.best-teachers.index', compact('bestTeachers', 'faculties'));
    }
}