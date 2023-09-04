<?php

namespace App\Models;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'uuid',
        'name', 'slug', 'description',
        'gates',
        'state', 'type'
    ];

    protected $casts = ['gates' => 'array'];

    public function users () {
        return $this->belongsToMany(User::class);
    }

    protected static function boot () {
        parent::boot();

        static::observe(RoleObserver::class);
    }
}
