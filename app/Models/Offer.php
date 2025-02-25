<?php

namespace App\Models;

use App\Enums\OfferPriceType;
use App\Enums\OfferType;
use App\Enums\PropertyLocations;
use App\Enums\PropertyType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Translatable\HasTranslations;

class Offer extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'slug',
        'title',
        'short_title',
        'description',
        'short_description',
        'price',
        'status',
        'price_type',
        'property_type',
        'offer_type',
        'location',
    ];

    public array $translatable = ['title', 'short_title', 'description', 'short_description'];

    protected $casts = [
        'price_type' => OfferPriceType::class,
        'location' => PropertyLocations::class,
        'property_type' => PropertyType::class,
        'offer_type' => OfferType::class,
        'status' => Status::class,
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeFilter(Builder $query): Builder
    {
        $query->when(request('o_status'), function ($query, $value) {
            $query->where('status', $value);
        });

        $query->when(request('o_s'), function ($query, $value) {
            $query->where(function (Builder $query) use ($value) {
                $query->where('short_title', 'like', "%{$value}%")
                    ->orWhere('title', 'like', "%{$value}%");
            });
        });

        return $query;
    }

    public function scopeWebsiteFilters(Builder $query): Builder
    {
        $query->when(request('o_type'), function ($query, $value) {
            $query->where('offer_type', $value);
        });

        $query->when(request('op_type'), function ($query, $value) {
            $query->where('property_type', $value);
        });

        $query->when(request('op_location'), function ($query, $value) {
            $query->where('location', $value);
        });

        $query->when(request('price'), function ($query, $value) {
            $query->where('price', '<=', (int) $value);
        });

        return $query;
    }

    public function details(): HasMany
    {
        return $this->hasMany(OfferDetail::class, 'offer_id');
    }

    // ############################ Media #####################################
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->useDisk('files')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg', 'image/jpg']);

        $this->addMediaCollection('brochure')
            ->useDisk('files');
    }

    public function gallery(): MediaCollection
    {
        return $this->getMedia('gallery');
    }

    public function getThumbUrl(): string
    {
        return $this->getFirstMediaUrl('gallery');
    }

    public function getBrochureUrl(): string
    {
        return $this->getFirstMediaUrl('brochure');
    }
}
