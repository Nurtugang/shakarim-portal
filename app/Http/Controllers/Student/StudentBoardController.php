<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentBoard;
use App\Models\Student\StudentBoardCategory;
use Illuminate\Http\Request;

class StudentBoardController extends Controller
{
    // Общая приватная функция для загрузки данных
    private function renderBoardPage($categoryId)
    {
        $locale = app()->getLocale();

        // 1. Получаем категорию (чтобы знать название: "Парламент" или "Сенат")
        $category = StudentBoardCategory::findOrFail($categoryId);
        $pageTitle = $category->{'name_' . $locale};

        // 2. Грузим студентов этой категории
        $students = StudentBoard::where('status', 1)
            ->where('category_id', $categoryId)
            ->orderBy('sort')
            ->get();

        // 3. Отдаем универсальный шаблон (переименуем папку в student/board)
        return view('student.board.index', compact('students', 'locale', 'pageTitle'));
    }

    // --- Публичные методы для роутов ---

    // Студенческий Парламент (ID = 1)
    public function parliament()
    {
        return $this->renderBoardPage(1);
    }

    // Студенческий Мажилис (ID = 2)
    public function majilis()
    {
        return $this->renderBoardPage(2);
    }

    // Студенческий Сенат (ID = 3)
    public function senate()
    {
        return $this->renderBoardPage(3);
    }
}