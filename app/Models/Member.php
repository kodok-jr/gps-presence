<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends User
{
    use HasFactory;

    protected static $singleTableType = Member::class;
}
