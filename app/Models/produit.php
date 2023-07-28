<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'category_id',
        'secteur_id',
        'sku',
        'expireDays',
        'mfgDate',
        'stock',
        'price',
        'sold',
        'dateProduction',
        'dateExpired',
        'variation',
        'size_id',
        'autres',
        'Usage',
        'comparedPrice',
        'grossitePrice',
        'packageType',
        'color',
        'image',
        'isTrending',
        'preDescription',
        'description',
        'PackagingDelivery',
        'Warnings',
        'isPublic',
        'variation_id'
    ];

    public function images()
    {
        return $this->hasMany(imageProduit::class);
    }
}
