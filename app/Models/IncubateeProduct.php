<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IncubateeProduct extends Pivot
{
    use HasFactory;

    protected $table = 'incubatee_products';

    protected $fillable = [
        'incubatee_id',
        'product_image',
        'product_name',
        'description',
    ];

    /**
     * Get the incubatee that owns this incubatee product.
     */
    public function incubatee()
    {
        return $this->belongsTo(Incubatee::class, 'incubatee_id');
    }

    /**
     * Get the products for this incubatee product.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'incubatee_product_id');
    }

    /**
     * Alias for products relationship.
     */
    public function productVariants()
    {
        return $this->products();
    }
}
