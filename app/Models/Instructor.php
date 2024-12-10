<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'user_id', 'skill', 'country', 'city', 'address', 'image', 'instagram', 'facebook', 'twitter'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

