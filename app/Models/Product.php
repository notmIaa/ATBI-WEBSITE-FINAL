<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'incubatee_product_id', 
        'product_name', 
        'description', 
        'product_image'
    ];

    public function incubateeProduct()
    {
        return $this->belongsTo(IncubateeProduct::class, 'incubatee_product_id');
    }
}

