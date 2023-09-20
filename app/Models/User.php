<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Traits\LarapatternTraits;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LarapatternTraits, SingleTableInheritanceTrait;

    /**
     * User table inheritance "ADMIN" and "MEMBER"
     *
     */
    protected $table = 'users';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [
        Admin::class,
        Member::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name', 'username', 'position', 'number_id', 'phone', 'address', 'gender', 'avatar',
        'email',
        'password',
        'state', 'type'
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
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presences () {
        return $this->hasMany(Presence::class, 'user_id', 'id');
    }

    /**
     * User Observer
     */
    protected static function boot () {
        parent::boot();

        static::observe(UserObserver::class);
    }
}
