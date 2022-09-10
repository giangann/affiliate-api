<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Review;

class ReviewRemain extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','website_id','reviews_remain'];

}
