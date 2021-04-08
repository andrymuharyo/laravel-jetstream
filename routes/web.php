<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\LanguageController;
/* Frontend */
use App\Http\Controllers\Frontend\HomeController;
/* Backend */
use App\Http\Livewire\Backend\Users;

use App\Http\Livewire\Backend\Navigations;
use App\Http\Controllers\Backend\NavigationController;

use App\Http\Livewire\Backend\Slides;
use App\Http\Livewire\Backend\Contents;
use App\Http\Livewire\Backend\Articles;
use App\Http\Livewire\Backend\Posts;
use App\Http\Livewire\Backend\Contact;
use App\Http\Livewire\Backend\Inquiries;
use App\Http\Livewire\Backend\Newsletters;
use App\Http\Livewire\Backend\Keywords;

use App\Http\Controllers\Backend\DataController;

use App\Http\Livewire\Backend\VideoCategories;
use App\Http\Livewire\Backend\Videos;
use App\Http\Controllers\Backend\VideoController;

use App\Http\Livewire\Backend\PhotoCategories;
use App\Http\Livewire\Backend\Photos;
use App\Http\Controllers\Backend\PhotoController;

use App\Http\Livewire\Backend\Links;
use App\Http\Livewire\Backend\Legals;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Fortify::registerView(function () {
//      return abort(404);
// });

/*
|--------------------------------------------------------------------------
| Change Language
|--------------------------------------------------------------------------
*/
Route::get('/language/{locale}', [LanguageController::class, 'index'])->name('config.language');
/*
|--------------------------------------------------------------------------
| FrontEnd
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/users', Users::class)->name('backend.users');
/*
|--------------------------------------------------------------------------
| Navigation
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/navigations', Navigations::class)->name('backend.navigations');
Route::post('/webadmin/navigations/{nestable}', [NavigationController::class, 'nestable'])->name('backend.navigations.nestable');
/*
|--------------------------------------------------------------------------
| Slides
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/slides', Slides::class)->name('backend.slides');
/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/posts', Posts::class)->name('backend.posts');
/*
|--------------------------------------------------------------------------
| Contents
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/contents', Contents::class)->name('backend.contents');
/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/contact', Contact::class)->name('backend.contact');
/*
|--------------------------------------------------------------------------
| Inquiries
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/inquiries', Inquiries::class)->name('backend.inquiries');
/*
|--------------------------------------------------------------------------
| Newsletters
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/newsletters', Newsletters::class)->name('backend.newsletters');
/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/articles', Articles::class)->name('backend.articles');
/*
|--------------------------------------------------------------------------
| Videos
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/videos-categories', VideoCategories::class)->name('backend.videos.categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/videos', Videos::class)->name('backend.videos');

Route::post('/webadmin/videos/{nestable}', [VideoController::class, 'nestable'])->name('backend.videos.nestable');
/*
|--------------------------------------------------------------------------
| Photos
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/photos-categories', PhotoCategories::class)->name('backend.photos.categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/photos', Photos::class)->name('backend.photos');

Route::post('/webadmin/photos/{nestable}', [PhotoController::class, 'nestable'])->name('backend.photos.nestable');
/*
|--------------------------------------------------------------------------
| Keywords
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/keywords', Keywords::class)->name('backend.keywords');
/*
|--------------------------------------------------------------------------
| Links
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/links', Links::class)->name('backend.links');
Route::post('/webadmin/links/{nestable}', Links::class)->name('backend.links.nestable');
/*
|--------------------------------------------------------------------------
| Legals
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/webadmin/legals', Legals::class)->name('backend.legals');

/*
|--------------------------------------------------------------------------
| Shared Host config
|--------------------------------------------------------------------------
|
| Here is where you set link storage and any other php artisan actions in shared host (non terminal)
|
*/

Route::get('/com/cache-clear', function () {
    \Artisan::call('cache:clear');
    return "cache clear!";
});
Route::get('/com/config-clear', function () {
    \Artisan::call('config:clear');
    return "config clear!";
});
Route::get('/com/view-clear', function () {
    \Artisan::call('view:clear');
    return "view clear!";
});
Route::get('/com/route-clear', function () {
    \Artisan::call('route:clear');
    return "route clear!";
});
Route::get('/com/key-generate', function () {
    \Artisan::call('key:generate');
    return "key generated!";
});
Route::get('/com/storage-link', function () {
    \Artisan::call('storage:link');
    return "storage linked!";
});
// Route::get('/com/storage-symlink', function () { 
//     $targetFolder = base_path().'/storage/app/public'; 
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; 
//     symlink($targetFolder, $linkFolder); 
// });
// Route::get('/com/migrate', function () {
//     \Artisan::call('migrate',
//     array(
//     '--path' => 'database/migrations',
//     '--database' => 'mysql',
//     '--force' => true));
//     return "db migrate!";
// });
// Route::get('/com/migrate-rollback', function () {
//     \Artisan::call('migrate:rollback',
//     array(
//     '--path' => 'database/migrations',
//     '--database' => 'mysql',
//     '--force' => true));
//     return "db migrate rollback!";
// });
