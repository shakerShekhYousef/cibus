<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\RestaurantTraits\RestaurantMethod;
use App\Models\Traits\RestaurantTraits\RestaurantRelationship;
use App\Models\Traits\RestaurantTraits\RestaurantScope;

class Restaurant extends Model
{
    use HasFactory, RestaurantRelationship, RestaurantMethod, RestaurantScope;
    public static $DEFAULT_STATUS=0;
    protected $fillable = [
        'owner_name',
        'owner_email',
        'restaurant_name',
        'address',
        'latitude',
        'longitude',
        'status',
        'rating',
        'description',
        'logo',
        'features',
        'city_id',
        'category_id',
        'user_id',
        'contact_information_facebook_gmail'

    ];
}
