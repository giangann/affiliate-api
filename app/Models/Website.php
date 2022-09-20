<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Review;

class Website extends Model
{
    use HasFactory;

    const IS_NETWORK_OF_THE_MONTH = ['YES' => 1, 'NO' => 0];

    const TYPE = [
        'Premium Network' => 1,
        'Affiliate Program' => 2,
        'Advertising Network' => 3
    ];

    protected $fillable = ['name', 'link', 'link_banner',
        'link_offer', 'offer_count', 'api',
        'description', 'payment_method', 'payment_frequency',
        'tracking_software', 'referral_commission', 'minimum_payment',
        'category_id', 'type', 'is_net_work_of_the_month',
        'tracking_link', 'commision_type', 'is_network_of_the_month'];

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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
