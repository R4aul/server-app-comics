<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function categories (){
        return $this->belongsToMany(Category::class, 'user_preferences');
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function review(){
        return $this->hasOne(Review::class);
    }

    public function favorites(){
        return $this->belongsToMany(Comic::class,'user_favorites');
    }

    public function comics() {
    return $this->belongsToMany(Comic::class, 'bookings')
                ->withPivot('booking_date', 'final_date', 'returned')
                ->withTimestamps();
    }
}

