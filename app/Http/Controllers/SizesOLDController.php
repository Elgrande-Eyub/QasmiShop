<?php

namespace App\Http\Controllers;

use App\Models\sizes;
use Illuminate\Http\Request;

class SizesController extends Controller
{

    public function getSizesPage()
    {
        $sizes = sizes::get();
        return view('admin.produit.sizes',compact('sizes'));
    }


    public function getSizesData()
    {
       return   sizes::get();

    }

    public function setSizePage(request $request)
    {
        if (empty($request->input('name'))) {
            return response()->json(['message' => 'name cest improtant'],400);
        }

        $added = sizes::create([
            'name' => $request->name,

        ]);

        return response()->json(['message' => 'Le Taille/Poids est cree avec success'],200);
    }




     public function delSizePage($id){

        $exist = sizes::where('id',$id)->first();

        if (!$exist) {
            return redirect()->back()->with(['erreur' => 'Size Not Found'], 400);
        }

        $exist->delete();

        return redirect()->back()->with(['success' => 'La Taille/Poids est supprimer avec success'], 200);
    }
}
