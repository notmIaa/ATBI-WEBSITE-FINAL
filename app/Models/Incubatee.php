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

    public function products()
    {
        return $this->belongsToMany(IncubateeProduct::class, 'incubatee_id');
    }
}
