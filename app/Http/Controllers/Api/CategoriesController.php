<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $categories = Category::all(); // Récupère toutes les catégories de la base de données
        return response()->json($categories);
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
            'nom_categorie' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Crée une nouvelle instance de catégorie avec les données validées
        $category = new Category();
        $category->nom_categorie = $validatedData['nom_categorie'];
        // Si vous avez d'autres champs à remplir, ajoutez-les ici

        // Sauvegarde de la catégorie dans la base de données
        $category->save();

        // Retourne une réponse JSON avec la catégorie nouvellement créée
        return response()->json($categories);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Category $categories)
    {
        return response()->json($categories);
    }

    /**
     * Affiche le formulaire pour éditer la ressource spécifiée.
     */
    public function edit(Category $categories)
    {
        return response()->json($categories);
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données.
     */
    public function update(Request $request, Category $category)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Met à jour les données de la catégorie avec les données validées
        $category->nom_categorie = $validatedData['nom_categorie'];
        // Si vous avez d'autres champs à mettre à jour, ajoutez-les ici

        // Sauvegarde des modifications dans la base de données
        $category->save();

        // Retourne une réponse JSON avec la catégorie mise à jour
        return response()->json($categories);
    }

    /**
     * Supprime la ressource spécifiée de la base de données.
     */
    public function destroy(Categories $categories)
    {
        // Supprime la catégorie de la base de données
        $category->delete();

        // Retourne une réponse JSON avec un message indiquant que la catégorie a été supprimée
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
