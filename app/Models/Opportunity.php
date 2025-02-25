<?php

namespace App\Models;

use App\Enums\OpportunityType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Opportunity extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'years_of_exp',
        'field_of_exp',
        'education',
        'job_title',
        'type',
        'note',
    ];

    protected $casts = [
        'type' => OpportunityType::class,
    ];

    public function scopeTraining(Builder $query): Builder
    {
        return $query->where('type', OpportunityType::TRAINING);
    }

    public function scopeEmployment(Builder $query): Builder
    {
        return $query->where('type', OpportunityType::EMPLOYMENT);
    }

    public function scopeFilter(Builder $query): Builder
    {
        $query->when(request('op_s'), function (Builder $query, $value) {
            $query->where(function (Builder $query) use ($value) {
                $query->where('name', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%");

            });
        });

        $query->when(request('op_type'), function (Builder $query, $value) {
            $query->where('type', $value);
        });

        return $query;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('resume')
            ->useDisk('files')
            ->singleFile();
    }

    public function getResumeUrl(): string
    {
        return $this->getFirstMediaUrl('resume');
    }
}
