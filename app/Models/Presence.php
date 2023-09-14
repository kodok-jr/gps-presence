<?php

namespace App\Models;

use App\Observers\PresenceObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    /**
     * The attribute that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid', 'user_id',
        'presence_date', 'time_in', 'time_out', 'photo_in', 'photo_out', 'locations',
        'state', 'type'
    ];

    /**
     * Get the user that owns the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Presence Observer
     */
    protected static function boot () {
        parent::boot();

        static::observe(PresenceObserver::class);
    }
}