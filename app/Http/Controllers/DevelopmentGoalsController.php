<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentGoal;
use App\Models\DevelopmentGoalEducation;
use App\Models\DevelopmentGoalDocument;
use Illuminate\Http\Request;

class DevelopmentGoalsController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        
        $goals = DevelopmentGoal::inLanguage($locale)
            ->ordered()
            ->get();
        
        $firstGoal = $goals->first();
        
        $educationProgramsFlat = DevelopmentGoalEducation::with('developmentGoal')
            ->inLanguage($locale)
            ->orderBy('development_goal_id')
            ->get();
        
        $documents = DevelopmentGoalDocument::inLanguage($locale)
            ->documents()
            ->orderBy('title')
            ->get();
        
        $reports = DevelopmentGoalDocument::inLanguage($locale)
            ->reports()
            ->orderBy('title')
            ->get();
        
        return view('development-goals.index', compact(
            'goals',
            'firstGoal',
            'educationProgramsFlat',
            'documents',
            'reports'
        ));
    }
}