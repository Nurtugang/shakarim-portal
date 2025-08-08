<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Science\SciencePurchaseController;
use App\Http\Controllers\Science\SciencePurchasesOfferController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Localization;
use App\Models\Science\SciencePurchase;
use App\Models\Science\SciencePurchasesIrn;
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
   Route::get('/structure', [StructureController::class,'index'])->name('structure.index');
   Route::get('/structure/{structure:slug}', [StructureController::class,'show'])->name('structure.show');
   Route::get('/science/purchases',[SciencePurchaseController::class,'index'])->name('science.purchases');
   Route::get('/sitemap', [SitemapController::class, 'index'])->name('sitemap');
   
});
Route::post('/offers', [SciencePurchasesOfferController::class, 'store'])->name('offers.store');

Route::get('/pdf-viewer/{filename}', function ($filename) {
    $pdfPath = storage_path("app/public/pdfs/{$filename}");

    if (!file_exists($pdfPath)) {
        abort(404);
    }

    $pdfUrl = asset("storage/pdfs/{$filename}");

    return view('pdf.viewer', compact('pdfUrl'));
});

Route::get('/events', EventController::class);

// Route::get('/test', function () {

//     $irn = SciencePurchasesIrn::all();

// $purchases = SciencePurchase::all();

// foreach($purchases as $purchase){
//     foreach($irn as $item){
//         if($purchase->irn == $item->name){
//             $purchase->irn_id = $item->id;
//             $purchase->save();
//         }
//     }
// }
// echo 'ok';
 
// });

