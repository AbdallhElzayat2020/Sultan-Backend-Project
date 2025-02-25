<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Blog extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'slug',
        'title',
        'user_id',
        'content',
        'excerpt',
        'status',
    ];

    public array $translatable = ['title', 'content', 'excerpt'];

    protected $casts = [
        'status' => Status::class,
    ];

    public function scopeFilter(Builder $query): Builder
    {
        $query->when(request('b_status'), function (Builder $query, $status) {
            $query->where('status', $status);
        });

        $query->when(request('b_s'), function (Builder $query, $s) {
            $query->where('title', 'LIKE', "%{$s}%");
        });

        return $query;
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', Status::ACTIVE);
    }

    protected static function booted()
    {
        parent::booted();

        self::creating(function (Blog $blog) {
            $blog->user_id = auth()->id();
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')
            ->withDefault();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
//            ->useFallbackUrl(asset('assets/dashboard/default/category/categories.png'))
            ->useDisk('files')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg', 'image/jpg']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(450)
            ->height(350)
            ->nonQueued();
    }

    public function getImageUrl(): string
    {
        return $this->getFirstMediaUrl('image');
    }

    public function getThumbUrl(): string
    {
        return $this->getFirstMediaUrl('image', 'thumb');
    }
}
