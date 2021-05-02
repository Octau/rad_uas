<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function itemListings(){
        return $this->hasMany(ItemListing::class, 'order_id');
    }
}
