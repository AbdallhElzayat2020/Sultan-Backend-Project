<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardHomeController;
use App\Http\Controllers\Admin\MailSubscriptionController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OpportunityController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth', 'check-status', 'force-ar'])->group(function () {

    // ##################### Dashboard Route ###########################
    Route::get('dashboard', [DashboardHomeController::class, 'index'])->name('dashboard');

    // ##################### Users Management Routes ###########################
    Route::post('users/{user}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
    Route::resource('users', UserController::class);

    // ##################### Blogs Management Routes ###########################
    Route::post('blogs/{blog}/update-status', [BlogController::class, 'updateStatus'])->name('blogs.update-status');
    Route::resource('blogs', BlogController::class);

    // ##################### Offers Management Routes ###########################
    Route::post('offers/{offer}/update-status', [OfferController::class, 'updateStatus'])->name('offers.update-status');
    Route::resource('offers', OfferController::class);

    // ##################### Contact us Management Routes ###########################
    Route::resource('contacts', ContactController::class);

    // ##################### Services Management Routes ###########################
    Route::post('services/{service}/update-status', [ServiceController::class, 'updateStatus'])->name('services.update-status');
    Route::resource('services', ServiceController::class);

    // ##################### Testimonials Management Routes ###########################
    Route::post('testimonials/{testimonial}/update-status', [TestimonialController::class, 'updateStatus'])->name('testimonials.update-status');
    Route::resource('testimonials', TestimonialController::class);

    // ##################### Opportunities Management Routes ###########################
    Route::resource('opportunities', OpportunityController::class);

    // ##################### Roles Management Routes ###########################
    Route::resource('roles', RoleController::class);

    // ##################### Partners Management Routes ###########################
    Route::post('partners/{partner}/update-status', [PartnerController::class, 'updateStatus'])->name('partners.update-status');
    Route::resource('partners', PartnerController::class);

    // ##################### Clients Management Routes ###########################
    Route::post('clients/{client}/update-status', [ClientController::class, 'updateStatus'])->name('clients.update-status');
    Route::resource('clients', ClientController::class);

    // ##################### Mail-Subscriptions Management Routes ###########################
    Route::prefix('mail-subscriptions')->as('mail-subscriptions.')
        ->controller(MailSubscriptionController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::delete('{mailSubscription}', 'destroy')->name('destroy');
        });

    // ##################### User Profile Routes ###########################
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// TODO: lOGO, Settings , notifications
