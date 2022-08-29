<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'score', 'content', 'website_id', 'user_id', 'offer', 'tracking', 'support', 'payout'
    ];

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
