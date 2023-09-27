<?php

namespace App\Models;

use App\Models\User;
use App\Observers\AbsenceObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;

    /**
     * The attribute that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid', 'user_id',
        'absence_date', 'status', 'description', 'approval',
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

        static::observe(AbsenceObserver::class);
    }
}
