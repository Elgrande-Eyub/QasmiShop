<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produitVariation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'produit_id',
        'size_id',
        'sold',
        'price',
        'comparedPrice',
        'stock',
        'grossitePrice',
        'minCommande'
    ];
}
