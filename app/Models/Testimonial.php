<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'client_name',
        'job_title',
        'testimonial',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function scopeFilter(Builder $query): Builder
    {
        $query->when(request('t_status'), function (Builder $query, $status) {
            $query->where('status', $status);
        });

        $query->when(request('t_s'), function (Builder $query, $value) {
            $query->where(function (Builder $query) use ($value) {
                $query->where('client_name', 'like', "%{$value}%")
                    ->orWhere('job_title', 'like', "%{$value}%");
            });
        });

        return $query;
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile')
            ->useFallbackUrl(asset('assets/dashboard/assets/img/user.png'))
            ->useDisk('files')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg', 'image/jpg']);
    }

    public function profileImageUrl(): string
    {
        return $this->getFirstMediaUrl('profile');
    }

    // TODO Image with default
}
