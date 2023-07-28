<?php

namespace App\Http\Controllers;

use App\Models\sizes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sizesController extends Controller
{
    public function index()
    {
        $sizes = sizes::get();
        return view('admin.sizes.sizes', compact('sizes'));
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

            $size = sizes::where('name', $request->size)->exists();
            if ($size) {
                return response()->json(['message' => 'ce taille/Poid déjà stocké','status' => 400]);
            }

            sizes::create([
                'name' => $request->size
            ]);

            DB::commit();
            return response()->json(['message' => 'Le taille/Poid ajouté avec succès','status' => 200]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'une erreur est survenue au moment dajouter de taille/Poid.','status' => 400]);
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
            $size = sizes::find($id);


            $exist = sizes::where('name', $request->size)->exists();
            if ($exist) {
                return response()->json(['message' => 'ce size déjà stocké','status' => 400]);
            }

            $size->update([
                'name' => $request->size
            ]);
            DB::commit();
            return response()->json(['message'=>'La taille/Poid mis à jour avec succès','status' => 200]);

        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(['message'=>'La taille/Poid une erreur s’est produite lors de la mise à jour du taille/Poid','status' => 400]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $size = sizes::find($id);
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
