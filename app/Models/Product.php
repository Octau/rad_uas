<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function itemListings(){
        return $this->hasMany(ItemListing::class, 'product_id');
    }

    public function productType(){
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
