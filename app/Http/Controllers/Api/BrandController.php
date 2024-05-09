<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $brands = Brand::all(); // Récupère toutes les marques de la base de données
        return response()->json($brands);
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     */
    public function create()
    {
        // Retourne une réponse JSON vide, car la création se fait côté client
        return response()->json([]);
    }

    /**
     * Stocke une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Crée une nouvelle instance de marque avec les données validées
        $brand = new Brand();
        $brand->brand_name = $validatedData['brand_name'];
        // Si vous avez d'autres champs à remplir, ajoutez-les ici

        // Sauvegarde de la marque dans la base de données
        $brand->save();

        // Retourne une réponse JSON avec la marque nouvellement créée
        return response()->json($brand);
    }

    // Les autres méthodes (show, edit, update, destroy) peuvent être implémentées de manière similaire en utilisant les opérations CRUD sur le modèle Brand.
}
