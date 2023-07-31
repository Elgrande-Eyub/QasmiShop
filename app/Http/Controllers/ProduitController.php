<?php

namespace App\Http\Controllers;

use App\Models\articleSize;
use App\Models\imageProduit;
use App\Models\produit;
use App\Models\produitCategorie;
use App\Models\produitVariation;
use App\Models\secteur;
use App\Models\sizes;
use Carbon\Carbon;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    public function getProduits()
    {

        $produits = produit::leftjoin('produit_categories', 'produit_categories.id', '=', 'produits.category_id')
        ->select('produits.*', 'produit_categories.categorie')
        ->get();

        foreach($produits as $produit){
            $variation = produitVariation::where('produit_id',$produit->id);

            $expensivePrice = $variation->max('price');
            $lowestPrice = $variation->min('price');
            $price = '€'.$lowestPrice.' - '.'€'.$expensivePrice;
            $produit->price =$price;

        }


        return view('admin.produit.list', compact('produits'));

    }

    public function getAddPage()
    {

        $categories = produitCategorie::get();
        $secteurs = secteur::get();
        $sizes = sizes::get();
        return view('admin.produit.add', compact('secteurs', 'sizes', 'categories'));

    }

    public function ajouteProduit(Request $request)
    {

          try {
        DB::beginTransaction();

        $product = produit::create([
           'name' => $request->input('name'),
           'type' => $request->input('type'),
           'category_id' => $request->input('category'),
           'secteur_id' => $request->input('secteur'),
           'sku' => $request->input('sku'),
           'expireDays' => $request->input('expireDays'),
           'dateProduction' => $request->input('dateProduction'),
           'dateExpired' => $request->input('dateExpired'),
           'variation' => $request->input('variationStatus'),
           'isPublic' => true,
           'preDescription' => $request->input('preDescription'),
           'description' => $request->input('description'),
           'Usage' => $request->input('Usage'),
           'autres' => $request->input('autres'),
           'packageType' => 'bottle',
           'PackagingDelivery' => $request->input('PackagingDelivery'),
           'Warnings' => $request->input('Warnings'),
        ]);

        if(!$product) {
            DB::rollBack();
            return response()->json(['message'=> 'erreur lors de lajout de Produit',400]);
        }

        $variations = json_decode($request->input('variations'), true);


            foreach ($variations as $variation) {
                produitVariation::create([
                    'produit_id' =>  $product->id,
                    'size_id' => $variation['size'],
                    'price' => $variation['price'],
                    'sold' => $variation['solde'],
                    'stock' => $variation['stock'],
                    'grossitePrice'=> $variation['grossitePrice'],
                    'comparedPrice' => $variation['comparedPrice'],
                    'minCommande' => $variation['minCommande'],
                ]);
            }



        foreach ($request->file('images') as $imagefile) {
            $imageProduit = new imageProduit();
            $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
            $imageProduit->image = $path;
            $imageProduit->produit_id = $product->id;
            $imageProduit->save();
        }


        DB::commit();
        return response()->json(['message'=>'Produit créé avec succès',200]);



           } catch(Exception $e) {
             DB::rollBack();
             return response()->json(['message'=> 'une erreur s’est produite',400]);
          }


    }

    public function edit($id){

        $produit = produit::find($id);
        $categories = produitCategorie::get();
        $secteurs = secteur::get();
        $sizes = sizes::get();

        return view('admin.produit.update',compact('produit','secteurs', 'sizes', 'categories'));
    }

    public function update(Request $request, $productId){


        DB::beginTransaction();

        // Find the product by its ID
        $product = produit::find($productId);

        if (!$product) {
            // Product not found, rollback the transaction and return an error response
            DB::rollBack();
            return response()->json(['message' => 'Product not found.', 404]);
        }

        // Update the product attributes
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->category_id = $request->input('category');
        $product->secteur_id = $request->input('secteur');
        $product->sku = $request->input('sku');
        $product->expireDays = $request->input('expireDays');
         $product->dateProduction = $request->input('dateProduction');
         $product->dateExpired = $request->input('dateExpired');
        $product->variation = $request->input('variationStatus');
        $product->preDescription = $request->input('preDescription');
        $product->description = $request->input('description');
        $product->Usage = $request->input('Usage');
        $product->autres = $request->input('autres');
        $product->PackagingDelivery = $request->input('PackagingDelivery');
        $product->Warnings = $request->input('Warnings');

        // Assuming other attributes like color, packageType, and isPublic don't need to be updated in this method.

        // Save the updated product
        $product->save();

        // Update variations
        $variations = json_decode($request->input('variations'), true);

        if ($request->input('variationStatus')) {
            // Delete existing variations for the product
            produitVariation::where('produit_id', $product->id)->delete();

            // Create new variations
            foreach ($variations as $variation) {
                produitVariation::create([
                    'produit_id' => $product->id,
                    'size_id' => $variation['size'],
                    'price' => $variation['price'],
                    'sold' => $variation['solde'],
                    'stock' => $variation['stock'],
                    'grossitePrice' => $variation['grossitePrice'],
                    'comparedPrice' => $variation['comparedPrice'],
                ]);
            }

            // Update product with data from the lowest price variation
            $lowestPrice = produitVariation::where('produit_id', $product->id)
                ->where('price', function ($query) use ($product) {
                    $query->from('produit_variations')
                        ->selectRaw('MIN(comparedPrice)')
                        ->where('produit_id', $product->id);
                })
                ->leftJoin('sizes', 'produit_variations.size_id', '=', 'sizes.id')
                ->select('produit_variations.*', 'sizes.id as size_id')
                ->first();

            $product->stock = $lowestPrice->stock;
            $product->price = $lowestPrice->price;
            $product->sold = $lowestPrice->sold;
            $product->size_id = $lowestPrice->size_id;
            $product->variation_id = $lowestPrice->id;
            $product->comparedPrice = $lowestPrice->comparedPrice;
            $product->grossitePrice = $lowestPrice->grossitePrice;

            $product->save();
        } else {
            // Update product with data from the first variation
            $product->stock = $variations[0]['stock'];
            $product->price = $variations[0]['price'];
            $product->size_id = $variations[0]['size'];
            $product->sold = $variations[0]['solde'];
            $product->comparedPrice = $variations[0]['comparedPrice'];
            $product->grossitePrice = $variations[0]['grossitePrice'];

            $product->save();
        }

        // Handle image updates (assuming you are handling file uploads correctly in your original code)
        if ($request->hasFile('images')) {
            // Delete all previous images associated with the product
         imageProduit::where('produit_id',$product->id)->delete();



            // Upload the new images

        foreach ($request->file('images') as $imagefile) {
            $imageProduit = new imageProduit();
            $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
            $imageProduit->image = $path;
            $imageProduit->produit_id = $product->id;
            $imageProduit->save();
        }
        }

        // Commit the transaction
        DB::commit();

        return response()->json(['message' => 'Product updated successfully', 200]);
    }

    public function deleteProduit($id)
    {

        try {
            DB::beginTransaction();

            $produit = produit::find($id);
            if (!$produit) {
                return response()->json(['message' => 'Enregistrement introuvable','status' => 400]);
            }

            $produit->delete();

            DB::commit();
            return response()->json(['message' => 'Enregistrement supprimé avec succès','status' => 200]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Une erreur est survenue lors de la suppression de l\'enregistrement','status' => 400]);
        }

    }

    public function visibleProduct($id)
    {
        try {
            DB::beginTransaction();

            $exist = produit::findOrFail($id);

            if($exist->isPublic == 1) {

                $exist->update([
                    'isPublic' => 0,
                ]);

                DB::commit();
                return response()->json(['message' => 'Product est maintenent Inactive','status' => 200]);

            }

            $exist->update([
                'isPublic' => 1,
            ]);

            DB::commit();
            return response()->json(['message' => 'Product est maintenent Active','status' => 200]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Une erreur est survenue lors de lactivation de l\'enregistrement','status' => 400]);
        }
    }

}
