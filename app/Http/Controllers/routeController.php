<?php

namespace App\Http\Controllers;

use App\Models\addToCart;
use App\Models\articleSize;
use App\Models\imageProduit;
use App\Models\produit;
use App\Models\produitCategorie;
use App\Models\produitVariation;
use App\Models\secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class routeController extends Controller
{
    public function index()
    {

        $products = produit::inRandomOrder()
            ->leftjoin('produit_categories', 'produit_categories.id', '=', 'produits.category_id')
            ->leftjoin('secteurs', 'secteurs.id', '=', 'produits.secteur_id')
            ->where('produits.isPublic', 1)
            ->select('produits.*', 'produit_categories.categorie', 'secteurs.secteur')
            ->get();

        $mergedProducts = $this->generateProduct($products);

        return view('FrontEnd.index', compact('mergedProducts'));
    }

    public function about()
    {
        return view('FrontEnd.about');
    }

    public function contact()
    {
        return view('FrontEnd.contact');
    }

    public function product($id)
    {
        $product = produit::leftjoin('produit_categories', 'produit_categories.id', '=', 'produits.category_id')
            ->leftjoin('secteurs', 'secteurs.id', '=', 'produits.secteur_id')
            ->select('produits.*', 'produit_categories.categorie', 'secteurs.secteur')
            ->where('produits.id', $id)
            ->first();

        $varaitions = produitVariation::where('produit_id', $product->id)
           ->leftjoin('sizes', 'produit_variations.size_id', '=', 'sizes.id')
           ->select('produit_variations.*', 'sizes.name', 'sizes.id as size_id')
           ->get();

        $variation = produitVariation::where('produit_id', $product->id)
            ->join('sizes', 'produit_variations.size_id', '=', 'sizes.id')
            ->orderBy('price', 'asc')
            ->select('produit_variations.*', 'sizes.name')
            ->first();

        $product->variation = $variation;

        $images = imageProduit::where('produit_id', $id)->get();

        return view('FrontEnd.product', compact('product', 'images', 'varaitions'));
    }

    public function login()
    {
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('index');
        }

        return view('FrontEnd.login');
    }

    public function cartPage(Request $request)
    {
// return session()->get('cart', []);

        $count = 0;
        $mergedProducts = [];

        if (auth()->check()) {
            $user = Auth::user();
            $count = addToCart::where('user_id', $user->id)->count();

            $produits = produit::leftjoin('add_to_carts', 'produits.id', '=', 'add_to_carts.produit_id')
                ->leftjoin('produit_variations', 'add_to_carts.variation_id', '=', 'produit_variations.id')
                ->leftjoin('sizes', 'produit_variations.size_id', '=', 'sizes.id')
                ->where('add_to_carts.user_id', $user->id)
                ->select('produits.name', 'produits.id as product_id', 'produit_variations.*', 'add_to_carts.quantity', 'add_to_carts.variation_id', 'add_to_carts.id as cartID', 'sizes.name as sizeName')
                ->get();

            foreach ($produits as $product) {
                $imagesMerged = [];
                $mergedProduct = $product;

                $image = imageProduit::where('produit_id', $product->product_id)->first();

                $mergedProduct->image = $image->image;
                $mergedProducts[] = $mergedProduct;
            }

            return view('FrontEnd.shopCart', compact('count', 'mergedProducts'));
        }

        $cartItems = session()->get('cart', []);

        $mergedProducts = [];

        foreach ($cartItems as $cartItem) {
            $product = produit::leftJoin('produit_variations', 'produits.id', '=', 'produit_variations.produit_id')
                ->leftJoin('sizes', 'produit_variations.size_id', '=', 'sizes.id')
                ->where('produit_variations.id', $cartItem['variation_id'])
                ->select('produits.name', 'produits.id as product_id', 'produit_variations.*', 'produit_variations.id as variation_id', 'sizes.name as sizeName')
                ->first();

            $product->quantity = $cartItem['quantity'];

            $image = imageProduit::where('produit_id', $product->product_id)->first();
            $product->image = $image->image;


            $product->itemID = $cartItem['itemID'];

            $mergedProducts[] = $product;
        }

        $count = count( $mergedProducts);

        return view('FrontEnd.shopCart', compact('count', 'mergedProducts'));
    }

    public function register()
    {
        return view('FrontEnd.register  ');
    }



    public function orderComfirmed()
    {
        $checkoutProduct= session()->get('checkoutProduct');
        return view('FrontEnd.orderConfirmed', compact('checkoutProduct'));
    }

    public function categorieView($id)
    {
        $products = produit::inRandomOrder()
        ->leftjoin('produit_categories', 'produit_categories.id', '=', 'produits.category_id')
        ->leftjoin('secteurs', 'secteurs.id', '=', 'produits.secteur_id')
        ->where('produits.isPublic', 1)
        ->where('produits.category_id', $id)
        ->select('produits.*', 'produit_categories.categorie', 'secteurs.secteur')
        ->get();

        $cateogie = produitCategorie::find($id);
        $productCounter =  count($products);

        $mergedProducts = $this->generateProduct($products);

        return view('FrontEnd.categories', compact('mergedProducts','cateogie','productCounter'));
    }

    public function shopView($id)
    {
        $products = produit::inRandomOrder()
        ->leftjoin('produit_categories', 'produit_categories.id', '=', 'produits.category_id')
        ->leftjoin('secteurs', 'secteurs.id', '=', 'produits.secteur_id')
        ->where('produits.isPublic', 1)
        ->where('produits.secteur_id', $id)
        ->select('produits.*', 'produit_categories.categorie', 'secteurs.secteur')
        ->get();

        $secteur = secteur::find($id);


        $mergedProducts = $this->generateProduct($products);

        return view('FrontEnd.secteur', compact('mergedProducts','secteur'));
    }

    public function generateProduct($products)
    {
        $mergedProducts = [];

        foreach ($products as $product) {
            $imagesMerged = [];
            $mergedProduct = $product;

            $image = imageProduit::where('produit_id', $product->id)->first();
            $variation = produitVariation::where('produit_id', $product->id)
                ->join('sizes', 'produit_variations.size_id', '=', 'sizes.id')
                ->orderBy('price', 'asc')
                ->select('produit_variations.*', 'sizes.name')
                ->first();

            $mergedProduct->variation = $variation;
            $mergedProduct->image = $image->image;
            $mergedProducts[] = $mergedProduct;
        }

        return  $mergedProducts ;
    }


}
