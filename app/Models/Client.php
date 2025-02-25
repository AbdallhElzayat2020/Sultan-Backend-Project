<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->useDisk('files')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg', 'image/jpg']);
    }

    public function getLogoUrl(): string
    {
        return $this->getFirstMediaUrl('logo');
    }
}
