<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends User  implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    protected static $singleTableType = Admin::class;
}
