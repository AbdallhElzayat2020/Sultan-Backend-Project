<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class OfferDetail extends Model
{
    use HasFactory, HasTranslations;

    public $timestamps = false;

    protected $fillable = [
        'key',
        'offer_id',
        'section',
        'data',
    ];

    public array $translatable = ['section', 'data'];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
}
