<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, Category::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($item) {
            $item->categories()->delete();
        });
    }
}
