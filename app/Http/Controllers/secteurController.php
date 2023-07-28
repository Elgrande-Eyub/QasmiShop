<?php

namespace App\Http\Controllers;

use App\Models\secteur;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class secteurController extends Controller
{
    public function index()
    {
        $secteur = secteur::get();
        return view('admin.secteur.Secteur', compact('secteur'));
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

            $size = secteur::where('secteur', $request->secteur)->exists();
            if ($size) {
                return response()->json(['message' => 'ce secteur déjà stocké','status' => 400]);
            }

            secteur::create([
                'secteur' => $request->secteur
            ]);

            DB::commit();
            return response()->json(['message' => 'Le secteur ajouté avec succès','status' => 200]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'une erreur est survenue au moment dajouter de secteur.','status' => 400]);
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
            $size = secteur::find($id);


            $exist = secteur::where('secteur', $request->secteur)->exists();
            if ($exist) {
                return response()->json(['message' => 'ce size déjà stocké','status' => 400]);
            }

            $size->update([
                'secteur' => $request->secteur
            ]);
            DB::commit();
            return response()->json(['message'=>'La secteur mis à jour avec succès','status' => 200]);

        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(['message'=>'La secteur une erreur s’est produite lors de la mise à jour du secteur','status' => 400]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $size = secteur::find($id);
            if (!$size) {
                return response()->json(['message' => 'Enregistrement introuvable','status' => 400]);
            }

            $size->delete();

            DB::commit();
            return response()->json(['message' => 'Enregistrement supprimé avec succès','status' => 200]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Une erreur est survenue lors de la suppression de l\'enregistrement','status' => 400]);
        }

    }
}
