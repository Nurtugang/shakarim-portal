<?php

use App\Http\Controllers\Api\NewsApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// API для новостей и объявлений
Route::prefix('')->group(function () {
    
    // Получить 5 последних новостей
    // GET /api/news?lang=kk
    Route::get('/news', [NewsApiController::class, 'getNews']);
    
    // Получить 5 последних объявлений  
    // GET /api/announcements?lang=ru
    Route::get('/announcements', [NewsApiController::class, 'getAnnouncements']);
    
});