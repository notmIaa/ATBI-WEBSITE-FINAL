<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incubatee extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'incubatee_name',
        'business_name',
    ];

    /**
     * One Incubatee has many IncubateeProducts.
     */
    public function incubateeProducts()
    {
        return $this->hasMany(IncubateeProduct::class, 'incubatee_id');
    }

    /**
     * Access all products for the incubatee through incubateeProducts.
     * 
     * Note: Adjust the keys if your column names differ.
     */
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,          // Final model we want to access.
            IncubateeProduct::class, // Intermediate model.
            'incubatee_id',          // Foreign key on IncubateeProduct table...
            'incubatee_product_id',  // Foreign key on Product table...
            'id',                    // Local key on Incubatee table.
            'id'                     // Local key on IncubateeProduct table.
        );
    }
}
