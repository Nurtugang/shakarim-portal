<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\ScienceJournal;

class ScienceJournalsController extends Controller
{
    /**
     * Отображает страницу с научными журналами (техническая серия).
     */
    public function techIndex()
    {
        // Получаем все журналы, сортируем по убыванию года и ID
        $journalsByYear = ScienceJournal::query()
            ->orderBy('year', 'desc')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('year'); // Группируем коллекцию по полю 'year'

        return view('science.journals.tech.index', compact('journalsByYear'));
    }
}