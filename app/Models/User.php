<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles,  Notifiable;

    const DEFAULT_PASSWORD = '123456789';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => Status::class,
    ];

    public function scopeFilter(Builder $query): Builder
    {
        $query->when(request('u_s'), function (Builder $query, $value) {
            $query->where(function (Builder $query) use ($value) {
                $query->where('name', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%");
            });
        });

        $query->when(request('u_status'), function (Builder $query, $value) {
            $query->where('status', $value);
        });

        return $query;
    }
}
