<?php

namespace App\Http\Controllers;

use App\Models\BoardCategory;

class BoardController extends Controller
{
    public function index()
    {
        $categories = BoardCategory::with('boards')->get();
        
        return view('university.board-directors.index', compact('categories'));
    }
}