<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'species',
        'breed',
        'title',
        'content'
    ];
}
