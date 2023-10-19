<?php

namespace App\Models;

use App\Observers\SettingObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'base_location', 'radius',
        'state', 'type'
    ];

    /**
     * User Observer
     */
    protected static function boot () {
        parent::boot();

        static::observe(SettingObserver::class);
    }
}
