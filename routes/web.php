<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Localization;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\AnnouncementController;

use App\Http\Controllers\Science\AspirantController;
use App\Http\Controllers\Science\BestTeacherController;
use App\Http\Controllers\Science\ScienceCentresController;
use App\Http\Controllers\Science\SciencePurchaseController;
use App\Http\Controllers\Science\ScienceJournalsController;
use App\Http\Controllers\Science\ScientificProjectsController;
use App\Http\Controllers\Science\ScienceDissertationController;
use App\Http\Controllers\Science\SciencePurchasesOfferController;

use App\Http\Controllers\Academy\AccreditationController;
use App\Http\Controllers\Academy\AcademySchoolsController;
use App\Http\Controllers\Academy\DiplomasController;

use App\Http\Controllers\BoardController;
use App\Http\Controllers\MinorController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\RectorBlogController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RectorQuestionController;
use App\Http\Controllers\DevelopmentGoalsController;

use App\Http\Controllers\Student\StudentBoardController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\CourseController;

use App\Models\PageFile;
use App\Models\Nirs\NirsMainContent;
use App\Models\Nirs\NirsConference;
use App\Models\Nirs\NirsItem;
use App\Models\Organization;

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
    Route::get('/', SiteController::class)->name('site.index');
    Route::get('/page/{page:slug?}',[PageController::class,'index'])->name('page');

    Route::get('/news',[NewsController::class,'index'])->name('news');
    Route::get('/news/{news:alias}',[NewsController::class,'show'])->name('news.show');
    Route::post('/news/{news:alias}/comment', [NewsController::class, 'storeComment'])->name('news.comment.store');

    // News images: upload single image and delete
    Route::post('/news/{news}/images', [NewsImageController::class, 'store'])->name('news.images.store');
    Route::delete('/news/{news}/images/{image}', [NewsImageController::class, 'destroy'])->name('news.images.destroy');

    Route::get('/structure', [StructureController::class,'index'])->name('structure.index');
    Route::get('/structure/{structure:slug}', [StructureController::class,'show'])->name('structure.show');

    Route::get('/sitemap', [SitemapController::class, 'index'])->name('sitemap');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/science/dissertations', [ScienceDissertationController::class, 'index'])->name('science.dissertations.index');
    Route::get('/science/purchases', [SciencePurchaseController::class,'index'])->name('science.purchases');
    Route::get('/science/centres', [ScienceCentresController::class, 'index'])->name('science.centres');
    Route::get('/science/journals', function (string $locale) {
        return view('science.journals.index');
    })->name('science.journals');
    Route::get('/science/journals/tech', [ScienceJournalsController::class, 'techIndex'])->name('science.journals.tech');
    Route::get('/science/best-teachers', [BestTeacherController::class, 'index'])->name('science.best-teachers');
    Route::get('/science/aspirants', [AspirantController::class, 'index'])->name('science.aspirants');
    Route::get('/science/projects', [ScientificProjectsController::class, 'index'])->name('science.projects.index');
    Route::get('/science/projects/{id}', [ScientificProjectsController::class, 'show'])->name('science.projects.show');
    Route::get('/science/students', function () {
        $mainContent = \App\Models\Nirs\NirsMainContent::find(1);

        $conferences = \App\Models\Nirs\NirsConference::orderBy('created_at', 'desc')->get();

        $itemsByYear = \App\Models\Nirs\NirsItem::orderBy('year', 'desc')
                                                ->orderBy('created_at', 'desc')
                                                ->get()
                                                ->groupBy('year');

        // Для секции "Научные студенческие кружки" - только научные (category_id = 1)
        $organizations = \App\Models\Organization::where('category_id', 1)->get();
        $locale = app()->getLocale();

        return view('science.students.index', compact('mainContent', 'conferences', 'itemsByYear', 'organizations', 'locale'));
    })->name('science.students.index');
    Route::get('/awards', [AwardController::class, 'index'])->name('awards.index');

    Route::get('/accreditation', [AccreditationController::class, 'index'])->name('academy.accreditation.index');
    Route::get('/academy/schools', [AcademySchoolsController::class, 'index'])->name('academy.schools');

    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');

    Route::get('/menu/{menu:id}', [MenuController::class, 'show'])->name('menu.show');

    Route::get('/rector-blog', [RectorBlogController::class, 'index'])->name('rector.blog');
    Route::get('/rector-blog/{post:slug}', [RectorBlogController::class, 'show'])->name('rector.post');

    Route::get('/development-goals', [DevelopmentGoalsController::class, 'index'])->name('development-goals.index');

    Route::get('/university/board', [BoardController::class, 'index'])->name('university.board-directors.index');

    
    Route::get('/minors', [MinorController::class, 'index'])->name('minor.index');
    Route::get('/minor/{id}', [MinorController::class, 'show'])->name('minor.show');

    Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/vacancy/{id}', [VacancyController::class, 'show'])->name('vacancy.show');

    Route::get('/student/parlament', [StudentBoardController::class, 'parliament'])->name('student.parliament');
    Route::get('/student/majilis', [StudentBoardController::class, 'majilis'])->name('student.majilis');
    Route::get('/student/senate', [StudentBoardController::class, 'senate'])->name('student.senate');

    Route::get('/academy/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/academy/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

    Route::get('/academy/diplomas', [DiplomasController::class, 'index'])->name('academy.diplomas.index');

    Route::get('/organization/science', [OrganizationController::class, 'science'])->name('organization.science');
    Route::get('/organization/social', [OrganizationController::class, 'social'])->name('organization.social');
    Route::get('/organization/{organization:id}', function ($locale, App\Models\Organization $organization) {
        return view('organization.show', [
            'organization' => $organization,
            'locale' => $locale
        ]);
    })->name('organization.show');

    Route::get('/under-development', function (string $locale) {
        return view('under-development.index');
    })->name('under-development');

    Route::get('/university/about', function (string $locale) {
        return view('university.about.index');
    })->name('university.about.index');

    Route::get('/university/contacts', function (string $locale) {
        return view('university.contacts.index');
    })->name('university.contacts.index');

    Route::get('/university/endowment', function (string $locale) {
        return view('university.endowment.index');
    })->name('university.endowment.index');
    
    Route::get('/academy/graduates', [GraduateController::class, 'index'])->name('graduates.index');
    Route::get('/partnership/internship', [InternshipController::class, 'index'])->name('internship.index');
    Route::get('/academy/op', [\App\Http\Controllers\Academy\EducationalProgramsController::class, 'index'])->name('academy.op.index');
    
    Route::get('/app', function (string $locale) {
        return view('app.index');
    })->name('app.index');
});

Route::get('/diplomas/download/{id}', [DiplomasController::class, 'download'])->name('diplomas.download');
Route::post('/academy/diplomas/login', [DiplomasController::class, 'login'])->name('diplomas.login');

Route::post('/offers', [SciencePurchasesOfferController::class, 'store'])->name('offers.store');
Route::post('/science/offers/store', [SciencePurchasesOfferController::class, 'store'])->name('science.offers.store');

Route::post('/rector-question', [RectorBlogController::class, 'storeQuestion'])->name('rector.question.store');
