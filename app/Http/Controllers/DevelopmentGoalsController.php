<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentGoal;
use App\Models\DevelopmentGoalEducation;
use App\Models\DevelopmentGoalsEducationContent;
use App\Models\DevelopmentWorkingGroupContent;
use App\Models\DevelopmentGoalDocument;
use Illuminate\Http\Request;

class DevelopmentGoalsController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        
        $goals = DevelopmentGoal::inLanguage($locale)
        ->with(['news' => function($query) use ($locale) {
            $query->where('status', 1)
                ->orderBy('date', 'desc');
        }])
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

        $keywords = DevelopmentGoalDocument::inLanguage($locale)
            ->keywords()
            ->orderBy('title')
            ->get();
        
        $workingGroups = DevelopmentGoalDocument::inLanguage($locale)
            ->workingGroups()
            ->orderBy('title')
            ->get();
        
        $educationContent = DevelopmentGoalsEducationContent::first();
        
        // Безопасное получение контента рабочей группы (таблица может не существовать до миграции)
        try {
            $workingGroupContent = DevelopmentWorkingGroupContent::first();
        } catch (\Exception $e) {
            $workingGroupContent = null;
        }
        
        return view('development-goals.index', compact(
            'goals',
            'firstGoal',
            'educationProgramsFlat',
            'documents',
            'reports',
            'keywords',
            'locale',
            'educationContent',
            'workingGroups',
            'workingGroupContent'
        ));
    }
}