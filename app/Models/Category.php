<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function users(){
        return $this->belongsToMany(User::class,'user_preferences');
    }

    public function comics(){
        return $this->hasMany(Comic::class);
    }
}
