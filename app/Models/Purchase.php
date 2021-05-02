<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    public function itemListings(){
        return $this->hasMany(ItemListing::class, 'purchase_id');
    }

    public function supplier(){
        return $this->has(Supplier::class, 'supplier_id');
    }
}
