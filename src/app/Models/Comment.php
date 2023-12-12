<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    public function commentable()
    {
        return $this->morphTo();
    }

    public function child()
    {
        return $this->hasMany(Comment::class,'parent_id')->with('child','admin')->where('status','accepted');
    }

    public function comments()
    {
        return $this->child()->with('comments');
    }


    public function parent()
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


}
