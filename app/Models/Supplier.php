<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function purchases(){
        return belongsToMany(Purchase::class, 'supplier_id');
    }
}
