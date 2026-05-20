<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'product_id',
        'product_name',
        'price',
        'quantity',
        'total_amount',
        'payment_method',
        'status',
        'created_at',
        'updated_at',
    ];

    // Relationship với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
