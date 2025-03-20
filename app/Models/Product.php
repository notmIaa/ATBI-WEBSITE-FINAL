<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'incubatee_name',
        'business_name',
    ];

    public function incubatees()
    {
        return $this->belongsToMany(Incubatee::class, 'incubatee_product', 'product_id', 'incubatee_id')
                    ->withPivot(['product_image', 'product_name', 'description']);
    }
    
}
