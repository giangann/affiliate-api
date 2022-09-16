<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Review;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'link_banner', 'link_offer', 'offer_count','api','description', 'payment_method', 'payment_frequency', 'tracking_software','referral_commission', 'minimum_payment',  'category_id', 'type'];

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
