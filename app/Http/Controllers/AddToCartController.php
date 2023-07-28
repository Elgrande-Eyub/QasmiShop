<?php

namespace App\Http\Controllers;

use App\Models\addToCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function addCart(Request $request)
    {

        $productId = $request->input('productId');
        $sizeId = $request->input('sizeId');
        $quantity = $request->input('quantity');
        $variationId = $request->input('variationId');

        if (Auth()->check()) {
            $user = Auth::user();
            $cartItem = addToCart::where('produit_id', $productId)
                ->where('user_id', $user->id)
                ->where('variation_id', $variationId)
                ->first();

            if ($cartItem) {
                if($quantity!=null) {
                    $cartItem->quantity = $quantity;
                } else {
                    $cartItem->quantity += 1;
                }

                $cartItem->save();
            } else {
                $cartSaved = addToCart::create([
                     'produit_id' => $productId,
                     'user_id' => $user->id,
                     'variation_id' => $variationId,
                     'quantity' => 1
                 ]);

                $Newquantity=1;
                if($quantity!=null) {
                    $cartSaved->update([
                        'quantity' => $quantity
                    ]);
                } else {
                    $cartSaved->update([
                        'quantity' => $Newquantity
                    ]);
                }

            }

            return response()->json(['message' => 'Produit ajouté au panier avec succès.']);
        }


        $cart = session()->get('cart', []);

        $foundItem = null;

        foreach ($cart as &$item) {
            if ($item['produit_id'] === $productId && $item['variation_id'] === $variationId) {
                if ($quantity !== null) {
                    $item['quantity'] = $quantity;
                } else {
                    $item['quantity'] += 1;
                }
                $foundItem = $item;
                break;
            }
        }

        if (!$foundItem) {
            $newItem = [
                'itemID' => uniqid(),
                'produit_id' => $productId,
                'variation_id' => $variationId,
                'quantity' => ($quantity !== null) ? $quantity : 1,
            ];

            $cart[] = $newItem;
        }

        session()->put('cart', $cart);


        return response()->json(['message' => 'Produit ajouté au panier avec succès.']);

    }

    public function updateQuantity(Request $request)
    {

        $rowId =$request->input('cartId');
        $quantity =$request->input('quantity');

        if (auth()->check()) {
            $cart = addToCart::find( $rowId);

            $cart->update([
                'quantity' =>  $quantity,
            ]);
        } else {
            $cart = session()->get('cart', []);
            $index = array_search($rowId, array_column($cart, 'itemID'));
            if ($index !== false) {
                $cart[$index]['quantity'] = $quantity;
            }
            session()->put('cart', $cart);
        }
    }

    public function deleteCart($id)
    {

        if(Auth()->check()) {
            $cart = addToCart::find($id);
            $cart->forceDelete();
            return response()->json(['message' => 'Le produit a été supprimé avec succès']);
        }

        $cart = session()->get('cart', []);

        $index = null;
        foreach ($cart as $key => $item) {
            if ($item['itemID'] === $id) {
                $index = $key;
                break;
            }
        }

        if ($index !== null) {
            array_splice($cart, $index, 1);
            session()->put('cart', $cart);
            return response()->json(['message' => 'Le produit a été supprimé avec succès']);
        }
    }



}
