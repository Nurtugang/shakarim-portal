<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        // Жадная загрузка: Грузим Награду, а внутри неё - Категорию
        $awards = Award::with(['rewardData.category']) 
            ->get()
            ->sortBy(function($award) {
                return [
                    $award->rewardData->category->id ?? 999,
                    -$award->year,
                    $award->sort
                ];
            });

        // Группировка
        $groupedAwards = $awards->groupBy(function ($item) {
            return $item->rewardData && $item->rewardData->category 
                ? $item->rewardData->category->name 
                : 'Other';
        })->map(function ($items) {
            return $items->groupBy(function ($item) {
                return $item->rewardData->name;
            });
        });

        return view('awards.index', compact('groupedAwards'));
    }
}