<?php

use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\NewsSchoolsApiController;
use App\Http\Controllers\Api\InfrastructureApiController;
use App\Http\Controllers\Api\FaqApiController;
use App\Http\Controllers\Api\AcademyApiController;
use App\Http\Controllers\Api\RatingsApiController;
use App\Http\Controllers\Api\DoubleDegreeApiController;

use Illuminate\Support\Facades\Route;

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

    Route::get('/infrastructure', [InfrastructureApiController::class, 'getInfrastructure']);

    Route::get('/faq', [FaqApiController::class, 'getFaq']);

    Route::get('/academy/schools', [AcademyApiController::class, 'getSchools']);

    Route::get('/ratings', [RatingsApiController::class, 'getRatings']);

    Route::get('/double-degree', [DoubleDegreeApiController::class, 'getPrograms']);
});