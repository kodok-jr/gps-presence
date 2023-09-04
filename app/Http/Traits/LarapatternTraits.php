<?php

namespace App\Http\Traits;

use App\Models\Role;

trait LarapatternTraits
{
    /**
     * The roles that belong to the LarapatternTraits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles () {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    /**
     * Get role attribute
     *
     * @return collections
     */
    public function getRoleAttribute () {
        return $this->roles()->first();
    }

    /**
     * Permission Lists
     *
     * @return void
     */
    public function getPermissionAttribute () {
        $permissions = [];

        foreach ($this->roles() as $key => $role) {
            $gates = $role->gates ?? [];

            foreach ($gates as $key => $gate) {
                if (!in_array($gate, $permissions)) {
                    $permissions[] = $gate;
                }
            }
        }

        return $permissions;
    }
}
