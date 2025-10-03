<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\BestTeacher;
use App\Models\Science\ScienceDirection;

class BestTeacherController extends Controller
{
    public function index()
    {
        $bestTeachers = BestTeacher::with(['scienceDirection'])
            ->orderBy('science_direction_id')
            ->orderBy('year', 'desc')
            ->get()
            ->groupBy('science_direction_id');

        $scienceDirections = ScienceDirection::whereIn('id', $bestTeachers->keys())
            ->orderBy('id')
            ->get()
            ->keyBy('id');

        return view('science.best-teachers.index', compact('bestTeachers', 'scienceDirections'));
    }
}