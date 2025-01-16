<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        $cat = Categorie::all();
        return view("produits.index",compact("produits","cat"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Categorie::all();
        return view("produits.create",compact("cat"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'categorie_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products/images', 'public');
            $validatedData['image'] = $imagePath;
        }
        //  dd($validatedData);
        Produit::create($validatedData);
        return redirect()->route("produits.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::find($id);
        return view("produits.show",compact("produit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::find($id);
        $cat = Categorie::all();
        return view("produits.edit",compact("produit","cat"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'categorie_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products/images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $produit = Produit::find($id);
        
        $produit->update($validatedData);
        return redirect("/produits");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produit::destroy($id);
        return response()->json()->setStatusCode(200);
    }
    public function filterByCategorie($categorie_id)
{
    if ($categorie_id == -1) {
        $produits = Produit::with('categorie')->get();
    } else {
        $produits = Produit::where('categorie_id', $categorie_id)->with('categorie')->get();
    }
    
    return response()->json($produits);
}
}
