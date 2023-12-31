<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected  $guarded =[];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function menu()
    {
        return $this->hasMany(self::class)->with('menu')->orderBy('sort');
    }
}
