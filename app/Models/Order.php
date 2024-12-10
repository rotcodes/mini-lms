<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'course_id', 'amount', 'stripe_payment_id', 'status','currency'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
