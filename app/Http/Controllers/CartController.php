<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\commande;
use App\Models\Produit;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, Produit $produit)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$produit->id])) {
            $cart[$produit->id]['quantity']++;
        } else {
            $cart[$produit->id] = [
                "name" => $produit->name,
                "quantity" => 1,
                "price" => $produit->price,
                "image" => $produit->image
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart()
    {
        return view('cart', ['cart' => session()->get('cart')]);
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }
    public function clearCart()
{
    session()->forget('cart');
    return redirect()->route('cart.index')->with('success', 'Cart has been cleared!');
}

    public function commander(Request $request){
       $total = $request->input('total');
        return view('commander',compact('total'));
    }
    public function saveCommand(Request $request){
        // dd($request);
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            "city" => 'required',
            "birthDay" => 'required',
        ]);
        Client::create($data);
        commande::create([
            "client_id" =>Client::latest()->first()->id,
            "total" => $request->input('total'),
            "etat" => "en cours"
        ]);
        return redirect()->route('home');
    }
}