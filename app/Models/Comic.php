<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function favorite(){
        return $this->belongsToMany(User::class,'user_favorites');
    }

    public function users() {
    return $this->belongsToMany(User::class, 'bookings')
                ->withPivot('booking_date', 'final_date', 'returned')
                ->withTimestamps();
}
}
