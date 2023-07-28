<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\commandeArticles;
use Darryldecode\Cart\Validators\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{

    public function index()
    {
      $commandes =  Commande::get();
      return view('admin.commande.commande',compact('commandes'));
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
        // try{
            DB::beginTransaction();
            $rules = [
                'name' => 'required',
                'adresse' => 'required',
                'telephone' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(['message'=>'veuillez remplir toutes les informations requises'])->withInput();
            }

            $user =null;
            if(auth()->check()){
                $user = Auth::user()->id;

                // $user->role('proffetional')
            }

            $Commande =  Commande::create([
                'user_id' => $user,
                'orderNumber' => uniqid(),
                'shipping_address' => $request->adresse,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'name' => $request->name,
            ]);

            $totalCommande =0;

            $checkoutProduct = session()->get('checkoutProduct');

            foreach ($checkoutProduct as $Product) {
                commandeArticles::create([
                    'commande_id' => $Commande->id,
                    'produit_id' => $Product['productID'],
                    'variation_id' => $Product['variation'],
                    'quantity' => $Product['quantity'],
                    'subTotal' => $Product['quantity'] * $Product['price'],
                ]);

                $totalCommande += $Product['quantity'] * $Product['price'];
            }

            $Commande->update([
                'total'=> $totalCommande
            ]);

            DB::commit();

            return view('FrontEnd.orderConfirmed',compact('checkoutProduct','Commande'));

       /*  }catch(Exception $e){
            DB::rollBack();
        } */


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $commande = Commande::find($id);
        $commande->articles = commandeArticles::join('produits','commande_articles.produit_id','=','produits.id')
        ->where('commande_id',$commande->id)
        ->select('produits.name','commande_articles.*')
        ->get();

      return view('admin.commande.commandeDetail',compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $Commande = Commande::find($id);
            if (!$Commande) {
                return response()->json(['message' => 'Enregistrement introuvable','status' => 400]);
            }

            commandeArticles::where('commande_id',$Commande->id)->delete();
            $Commande->delete();

            DB::commit();
            return response()->json(['message' => 'Enregistrement supprimé avec succès','status' => 200]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Une erreur est survenue lors de la suppression de l\'enregistrement','status' => 400]);
        }
    }
}
