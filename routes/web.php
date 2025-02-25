<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HiringController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\InternshipController;
use App\Http\Controllers\Front\MailSubscriptionController;
use App\Http\Controllers\Front\OfferController;
use App\Http\Controllers\Front\ServicesController;
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
// Route::get('/', function () {
//    return view('dashboard.pages.index');
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/about', [AboutController::class, 'index'])->name('about');

        Route::get('/services', [ServicesController::class, 'index'])->name('services');

        Route::get('/services-details/{service:slug}', [ServicesController::class, 'show'])->name('service.details');

        Route::get('/offers', [OfferController::class, 'index'])->name('offers');

        Route::get('/offer-details/{offer:slug}', [OfferController::class, 'show'])->name('offers.details');

        Route::get('/apply', [HiringController::class, 'index'])->name('apply');
        Route::post('/apply-store', [HiringController::class, 'store'])->name('apply.store');

        Route::get('/internship', [InternshipController::class, 'index'])->name('internship');
        Route::post('/internship-store', [InternshipController::class, 'store'])->name('internship.store');

        Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

        Route::get('/blogs-details/{blog:slug}', [BlogController::class, 'show'])->name('blogs.details');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::post('/contact/save', [ContactController::class, 'store'])->name('contact.store');

        Route::post('/mail-subscription', MailSubscriptionController::class)->name('mails.store');
    });

require __DIR__.'/auth.php';
