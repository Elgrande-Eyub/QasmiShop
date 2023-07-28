<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class commandeArticles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'produit_id',
        'variation_id',
        'quantity',
        'subTotal',
        'commande_id'
    ];
}
