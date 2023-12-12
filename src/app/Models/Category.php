<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id',);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id', 'id')->with('children');
    }

    public function news()
    {
        return $this->hasMany(News::class)->latest();
    }

    public function childNews()
    {
        return $this->hasManyThrough(News::class,Category::class)->latest();
    }
}
