<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function products(){
        return $this->belongsToMany(Products::class, 'product_type_id');
    }
}
