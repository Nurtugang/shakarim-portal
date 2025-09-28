<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentGoal;
use Illuminate\Http\Request;

class DevelopmentGoalsController extends Controller
{
    public function index(string $locale)
    {
        $goals = DevelopmentGoal::inLanguage($locale)
                               ->ordered()
                               ->get();

        $firstGoal = $goals->first();

        return view('development-goals.index', compact('goals', 'firstGoal'));
    }
}