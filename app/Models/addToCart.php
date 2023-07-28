<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class addToCart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'produit_id',
        'user_id',
        'size_id',
        'variation_id',
        'quantity',
    ];
}
