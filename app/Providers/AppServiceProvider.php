<?php

namespace App\Providers;

use App\Contracts\Repositories\BlogRepositoryInterface;
use App\Contracts\Repositories\ContactRepositoryInterface;
use App\Contracts\Repositories\MailSubscriptionRepositoryInterface;
use App\Contracts\Repositories\OfferRepositoryInterface;
use App\Contracts\Repositories\OpportunityRepositoryInterface;
use App\Contracts\Repositories\PermissionRepositoryInterface;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Contracts\Repositories\ServiceRepositoryInterface;
use App\Contracts\Repositories\TestimonialRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MailSubscriptionRepository;
use App\Repositories\OfferRepository;
use App\Repositories\OpportunityRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TestimonialRepository;
use App\Repositories\UserRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(OfferRepositoryInterface::class, OfferRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(OpportunityRepositoryInterface::class, OpportunityRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
        $this->app->bind(MailSubscriptionRepositoryInterface::class, MailSubscriptionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
