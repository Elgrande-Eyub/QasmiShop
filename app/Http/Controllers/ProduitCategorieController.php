<?php

namespace App\Http\Controllers;

use App\Models\produitCategorie;
use Illuminate\Http\Request;

class ProduitCategorieController extends Controller
{
    public function getData(){
        $categories = produitCategorie::get();
        return  view('admin.produit.categories',compact('categories'));
    }

    public function setCategoriePage(request $request)  {

        if (empty($request->input('categorie'))) {
            return response()->json(['message' => 'Categorie est improtant'],400);
        }

        $added = produitCategorie::create([
            'categorie' => $request->categorie,
        ]);

        return response()->json(['message' => 'La categorie est cree avec success'],200);
    }

    public function updateCategorie(Request $request){

    $exist = produitCategorie::where('id',$request->input('idCategorie'))->first();

    if (!$exist) {
        return redirect()->back()->with(['erreur' => 'Catégorie introuvable'], 400);
    }

    $exist->update([
        'categorie' => $request->input('categorie'),
    ]);

    return redirect()->back()->with(['success' => 'La catégorie a ete mise à jour avec succès'], 200);
    }

    public function DeleteCategorie($id){

        $exist = produitCategorie::where('id',$id)->first();

        if (!$exist) {
            return redirect()->back()->with(['erreur' => 'Catégorie introuvable'], 400);
        }

        $exist->delete();

        return redirect()->back()->with(['success' => 'La catégorie est supprimée avec succès'], 200);
    }

}
