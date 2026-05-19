<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category'
    ];

    // 1 sản phẩm có nhiều kho
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function getTotalStockAttribute()
{
    return $this->inventories->sum('quantity');
}
}