<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    public function scopeFilter(Builder $query): Builder
    {
        return $query->when(request('ms_s'), function (Builder $query, string $s) {
            return $query->where('email', 'LIKE', "%$s%");
        });
    }
}
