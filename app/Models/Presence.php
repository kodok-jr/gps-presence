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
        'presence_date', 'time_in', 'time_out', 'photo_in', 'photo_out', 'location_in', 'location_out',
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


    public function getTableFieldAttribute(){
        return [ __('Admin Name'), __('Email'), __('Role'), __('Created at'), __('Status'), __('Action')];
    }

    public function getButtonActionsAttribute(){
        return [
            [
                'gate' => 'module.access.master.account.admin.edit',
                'button' => Form::href('Edit', ['href' => route('admin.admin.accounts.admin.edit', [$this->uuid, 'back' => route('admin.admin.accounts.admin.index')]), 'class' => 'btn btn-primary btn-sm'])
            ],

        ];
    }
    public function getDatatableOptionAttribute(){
        return [
            'processing' => true,
            'serverSide' => true,
            'ajax' => route('admin.admin.accounts.admin.index'),
            'columns' => [
                ['data' => 'name', 'class' => 'text-left'],
                ['data' => 'email', 'class'=>'text-left'],
                ['data' => 'role', 'class'=>'text-left'],
                ['data' => 'created_at', 'class'=>'text-left'],
                ['data' => 'state'],
                ['data' => 'action', 'class' => 'text-right', 'orderable'=>false]
            ],
            'filterColumn' => [
                'exclude' => [5]
            ]
        ];
    }
}
