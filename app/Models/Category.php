<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($item) {
            $item->videos()->delete();
        });
    }
}
