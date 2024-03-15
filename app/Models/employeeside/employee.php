<?php

namespace App\Models\employeeside;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class employee extends Authenticatable
{
    use HasFactory,HasRoles;
    // protected $guard = 'employee';
}
