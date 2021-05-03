<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemListing extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function orders(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function purchases(){
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function products(){
        return $this->belongsTo(Purchase::class, 'products_id');
    }
}
