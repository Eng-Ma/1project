<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot() {
        parent::boot();
        static::deleting(function($item) {
            CustomerVideo::where('customer_id', $item->id)->delete();
        });
    }

    public function videos() {
        return $this->belongsToMany(Video::class, 'customer_videos', 'customer_id', 'video_id');
    }
}
