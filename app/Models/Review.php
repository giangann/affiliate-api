<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $appends = ['user_name'];

    protected $fillable = [
        'score', 'content', 'website_id', 'user_id', 'offer', 'tracking', 'support', 'payout'
    ];

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getUserNameAttribute()
    {
        return $this->attributes['user_name'] = $this->user->name;
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function setAvgOfferAttribute()
    {
        return $this->atrributes['avg_offer'] = 3;
    }
}
