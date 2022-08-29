<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'name', 'max_score'];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
