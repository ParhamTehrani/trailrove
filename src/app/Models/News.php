<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function faqable()
    {
        return $this->morphMany(Faq::class, 'faqable');
    }

    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function publishComment()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status','accepted');
    }
}
