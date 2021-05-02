<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function itemListings(){
        return $this->hasMany(ItemListing::class, 'product_id');
    }

    public function productType(){
        return $this->has(ProductType::class, 'product_type_id');
    }
}
