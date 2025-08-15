<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\ScientificProject;
use Illuminate\Http\Request;

class ScientificProjectsController extends Controller
{
    /**
     * Display a listing of scientific projects grouped by years.
     */
    public function index()
    {
        $projectsByYears = ScientificProject::getProjectsGroupedByYears();
        $years = ScientificProject::getUniqueYears();
        
        return view('science.projects.index', compact('projectsByYears', 'years'));
    }

    /**
     * Display the specified scientific project.
     */
    public function show($locale, $id)
    {
        $project = ScientificProject::findOrFail($id);
        
        return view('science.projects.show', compact('project'));
    }
}