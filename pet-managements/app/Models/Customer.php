<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pet;
use App\Models\Payment;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}