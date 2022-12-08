<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsToThrough(Level::class, Category::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_videos', 'video_id', 'customer_id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($item) {
            CustomerVideo::where('video_id', $item->id)->delete();
        });
    }
}
