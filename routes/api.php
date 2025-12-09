<?php

use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\NewsSchoolsApiController;
use Illuminate\Support\Facades\Route;

// API для новостей и объявлений
Route::prefix('')->group(function () {
    // Получить 5 последних новостей
    // GET /api/news?lang=kk
    Route::get('/news', [NewsApiController::class, 'getNews']);

    // Получить новости школы с тегами в диапазоне ID 987-1010
    // GET /api/news/schools?lang=kk
    Route::get('/news/schools', [NewsSchoolsApiController::class, 'getNews']);
    
    // Получить 5 последних объявлений  
    // GET /api/announcements?lang=ru
    Route::get('/announcements', [NewsApiController::class, 'getAnnouncements']);
});