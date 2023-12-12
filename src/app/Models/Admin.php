<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function roleHasPermission($permission)
    {
        if (is_string($permission)) {
            return $this->role()->with('permissions')->first()->getRelation('permissions')->contains('name_en', $permission);
        }
    }

}
