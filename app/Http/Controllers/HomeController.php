<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('Home.home',compact('produits'));
    }
}
