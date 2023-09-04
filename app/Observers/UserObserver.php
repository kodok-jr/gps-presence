<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating (User $user) {
        $user->uuid = (string) Str::uuid();
        $filename = 'admin-'.Str::slug($user->name).'.png';

        $path = "/avatars".DIRECTORY_SEPARATOR;

        if (!Storage::exists($path))
            Storage::disk('public')->makeDirectory($path);

        Avatar::create($user->name)->save(storage_path().'/app/public/avatars/'.$user->name.'.png');

        $user->avatar = $filename;
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
