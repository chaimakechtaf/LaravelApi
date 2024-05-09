<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Affiche une liste de tous les produits.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retourner une réponse JSON indiquant que la création est autorisée
        return response()->json(['message' => 'Creation allowed']);
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData= $request->validate([
            'nom' => 'required|string',
            'old_price' => 'required|numeric',
            'new_price' => 'required|numeric',
            'image' => 'required|string',
            'description' => 'nullable|string',
            'slug' => 'required|string',
            'barcode' => 'required|string',
            'ispublished' => 'nullable|boolean',
            'facture' => 'required|boolean',
            'instock' => 'required|boolean',
            'categories' => 'required|string',
            'subcategory' => 'required|string',
        ]);

        Product::create($validatedData);

        // Retourner une réponse JSON pour indiquer que le produit a été créé avec succès
        return response()->json(['message' => 'Product created successfully']);
    }

    /**
     * Affiche les détails d'un produit spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['product' => $product]);
    }

    /**
     * Affiche le formulaire pour modifier un produit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['product' => $product]);
    }

    /**
     * Met à jour les informations d'un produit dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'old_price' => 'required|numeric',
            'new_price' => 'required|numeric',
            'image' => 'required|string',
            'description' => 'nullable|string',
            'slug' => 'required|string',
            'barcode' => 'required|string',
            'ispublished' => 'nullable|boolean',
            'facture' => 'required|boolean',
            'instock' => 'required|boolean',
            'categories' => 'required|string',
            'subcategory' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        // Retourner une réponse JSON pour indiquer que le produit a été mis à jour avec succès
        return response()->json(['message' => 'Product updated successfully']);
    }

    // Ajouter d'autres méthodes selon vos besoins (supprimer, etc.)
}
