<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'link_banner', 'link_offer', 'api', 'referral_commissione', 'mininum_payment', 'payment_frequency_id', 'tracking_software_id'];

}