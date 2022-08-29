<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    const STATUS_LIKE = [
        'LIKE' => 1,
        'DISLIKE' => 2,
        'NO_REACT' => 0
    ];

    protected $fillable = ['is_like', 'review_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}
