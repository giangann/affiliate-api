<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Review;

class Website extends Model
{
    use HasFactory;

    const TYPE = [
        'Premium Network' => 1,
        'Affiliate Program' => 2,
        'Advertising Network' => 3
    ];

    protected $fillable = ['name', 'link', 'link_banner', 'link_offer', 'offer_count', 'api', 'description', 'payment_method', 'payment_frequency', 'tracking_software', 'referral_commission', 'minimum_payment',  'category_id', 'website_type_id', 'is_net_work_of_the_month', 'tracking_link', 'commision_type'];

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

    public function website_type()
    {
        return $this->belongsTo(WebsiteType::class, 'website_type_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
