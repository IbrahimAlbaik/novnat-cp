<?php

use App\Http\Controllers\FAQController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('faqs', FAQController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('goals', GoalController::class);
    Route::resource('about', AboutController::class)->only(['edit', 'update']);
    Route::resource('gallery', GalleryController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('sliders', SliderController::class);
    Route::post('/upload-media', [SliderController::class, 'uploadMedia'])->name('media.upload');
    Route::resource('stories', StoryController::class);

    Route::post('images/{modelName}/{modelId}/store', [ImageController::class, 'store'])->name('images.store');
    Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');

});

require __DIR__ . '/auth.php';
