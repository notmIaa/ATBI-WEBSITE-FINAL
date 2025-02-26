<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IncubateeProduct extends Pivot
{
    use HasFactory;
    protected $fillable=[
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
}
