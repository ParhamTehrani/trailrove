<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public static function createLog($description)
    {
        parent::create([
            'admin_id'=>auth()->id(),
            'description'=>$description
        ]);
    }
}
