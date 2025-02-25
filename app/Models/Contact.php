<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact_inquiries';

    protected $fillable = [
        'name',
        'phone',
        'service_id',
        'offer_type',
        'message',
    ];

    public function scopeFilter(Builder $query): Builder
    {
        $query->when(request('c_s'), static function ($query, $value) {
            $query->where(function (Builder $query) use ($value) {
                $query->where('name', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('phone', 'like', "%{$value}%");
            });
        });

        $query->when(request('ser'), static function ($query, $value) {
            $query->where('service_id', $value);
        });

        return $query;
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class)
            ->withDefault([
                'title' => '-----',
            ]);
    }
}
