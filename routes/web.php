<?php

use App\Http\Middleware\Localization;

use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MenuController;

use App\Http\Controllers\Science\SciencePurchaseController;
use App\Http\Controllers\Science\SciencePurchasesOfferController;
use App\Http\Controllers\Science\ScienceCentresController;
use App\Http\Controllers\Science\ScienceJournalsController;
use App\Http\Controllers\Science\BestTeacherController;
use App\Http\Controllers\Science\AspirantController;
use App\Http\Controllers\Science\ScientificProjectsController;

use App\Http\Controllers\Academy\AccreditationController;
use App\Http\Controllers\Academy\AcademySchoolsController;

use App\Http\Controllers\AnnouncementController;

use App\Http\Controllers\RectorBlogController;
use App\Http\Controllers\RectorQuestionController;


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('language', function (Request $request) {
    \Illuminate\Support\Facades\App::setLocale($request->locale);
     session()->put('locale', $request->locale);

     $parsedUrl = parse_url(url()->previous());
     if (isset($parsedUrl['path'])) {
        $path = $parsedUrl['path'];
        $path = preg_replace('/^\/\w{2}\//', '/' . $request->locale . '/', $path);

        $redirectUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $path;
     }
     else{
        $redirectUrl = '/';
     }
  return redirect()->to($redirectUrl);
})->name('language');

Route::group([
    'prefix' => '{locale?}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => Localization::class
], function () {
    Route::get('/', SiteController::class)
    ->name('site.index');
    Route::get('/page/{page:slug?}',[PageController::class,'index'])->name('page');
    Route::get('/list/{pageList:slug}',[PageController::class,'listItem'])->name('list.item');

    Route::get('/news',[NewsController::class,'index'])->name('news');
    Route::get('/news/{news:alias}',[NewsController::class,'show'])->name('news.show');
    Route::post('/news/{news:alias}/comment', [NewsController::class, 'storeComment'])->name('news.comment.store');

    Route::get('/structure', [StructureController::class,'index'])->name('structure.index');
    Route::get('/structure/{structure:slug}', [StructureController::class,'show'])->name('structure.show');

    Route::get('/sitemap', [SitemapController::class, 'index'])->name('sitemap');
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    Route::get('/science/purchases', [SciencePurchaseController::class,'index'])->name('science.purchases');
    Route::get('/science/centres', [ScienceCentresController::class, 'index'])->name('science.centres');
    Route::get('/science/journals', [ScienceJournalsController::class, 'index'])->name('science.journals');
    Route::get('/science/best-teachers', [BestTeacherController::class, 'index'])->name('science.best-teachers');
    Route::get('/science/aspirants', [AspirantController::class, 'index'])->name('science.aspirants');
    Route::get('/science/projects', [ScientificProjectsController::class, 'index'])->name('science.projects.index');
    Route::get('/science/projects/{id}', [ScientificProjectsController::class, 'show'])->name('science.projects.show');

    Route::get('/accreditation', [AccreditationController::class, 'index'])->name('academy.accreditation.index');
    Route::get('/academy/schools', [AcademySchoolsController::class, 'index'])->name('academy.schools');

    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');

    Route::get('/menu/{menu:id}', [MenuController::class, 'show'])->name('menu.show');

    Route::get('/rector-blog', [RectorBlogController::class, 'index'])->name('rector.blog');
    Route::get('/rector-blog/{post:slug}', [RectorBlogController::class, 'show'])->name('rector.post');
    
    Route::get('/under-development', function (string $locale) {
        return view('under-development.index');
    })->name('under-development');

    Route::get('/university/about', function (string $locale) {
        return view('university.about.index');
    })->name('university.about.index');

    Route::get('/university/contacts', function (string $locale) {
        return view('university.contacts.index');
    })->name('university.contacts.index');

});

Route::post('/offers', [SciencePurchasesOfferController::class, 'store'])->name('offers.store');
Route::post('/rector-question', [RectorBlogController::class, 'storeQuestion'])->name('rector.question.store');
Route::get('/events', EventController::class);

Route::get('/pdf-viewer/{filename}', function ($filename) {
    $pdfPath = storage_path("app/public/pdfs/{$filename}");

    if (!file_exists($pdfPath)) {
        abort(404);
    }

    $pdfUrl = asset("storage/pdfs/{$filename}");

    return view('pdf.viewer', compact('pdfUrl'));
});