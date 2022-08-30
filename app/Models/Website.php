<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Review;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'link_banner', 'link_offer', 'api', 'referral_commissione', 'minimum_payment', 'payment_frequency_id', 'tracking_software_id', 'category_id', 'payment_method_id'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'website_id');
    }

    public function scopeSearch($query, $keyword)
    {
        if (isset($keyword)) {
            $query = $query->where('name', 'like', "%$keyword%");
        }

        return $query;
    }
}
