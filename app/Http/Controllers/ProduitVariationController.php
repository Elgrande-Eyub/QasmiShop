<?php

namespace App\Http\Controllers;

use App\Models\produitVariation;
use Illuminate\Http\Request;

class ProduitVariationController extends Controller
{
    //

    public function show($id){
        $variation = produitVariation::find($id);
        return response()->json( $variation );
    }
}
