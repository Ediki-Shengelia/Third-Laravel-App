<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public static array $type = ['TV', "PC", 'Mobile', 'Watch', 'Others'];
    protected $fillable = ['title', 'old_price', 'price', 'type', 'product_image', 'unique_id', 'phone_number', 'description', 'location', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
