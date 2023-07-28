<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\produitCategorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = produitCategorie::get();
        return view('admin.categorie.categorie', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $categorie = produitCategorie::where('categorie', $request->categorie)->exists();
            if ($categorie) {
                return response()->json(['message' => 'ce categorie déjà stocké','status' => 400]);
            }

            produitCategorie::create([
                'categorie' => $request->categorie
            ]);

            DB::commit();
            return response()->json(['message' => 'Le categorie ajouté avec succès','status' => 200]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'une erreur est survenue au moment dajouter le categorie.','status' => 400]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $categorie = produitCategorie::find($id);


            $exist = produitCategorie::where('categorie', $request->categorie)->exists();
            if ($exist) {
                return response()->json(['message' => 'ce categorie déjà stocké','status' => 400]);
            }

            $categorie->update([
                'categorie' => $request->categorie
            ]);
            DB::commit();
            return response()->json(['message'=>'Le categorie mis à jour avec succès','status' => 200]);

        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(['message'=>'Le categorie une erreur s’est produite lors de la mise à jour du categorie','status' => 400]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $categorie = produitCategorie::find($id);
            if (!$categorie) {
                return response()->json(['message' => 'Enregistrement introuvable','status' => 400]);
            }

            $categorie->delete();

            DB::commit();
            return response()->json(['message' => 'Enregistrement supprimé avec succès','status' => 200]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Une erreur est survenue lors de la suppression de l\'enregistrement','status' => 400]);
        }

    }
}
