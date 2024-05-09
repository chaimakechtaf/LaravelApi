<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\Request;

class VariationsController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $variations = Variation::all(); // Récupère toutes les variations de la base de données
        return response()->json($variations);
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
            'var_name' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Crée une nouvelle instance de variation avec les données validées
        $variation = new Variation();
        $variation->var_name = $validatedData['var_name'];
        // Si vous avez d'autres champs à remplir, ajoutez-les ici

        // Sauvegarde de la variation dans la base de données
        $variation->save();

        // Retourne une réponse JSON avec la variation nouvellement créée
        return response()->json($variation);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Variation $variation)
    {
        return response()->json($variation);
    }

    /**
     * Affiche le formulaire pour éditer la ressource spécifiée.
     */
    public function edit(Variation $variation)
    {
        return response()->json($variation);
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données.
     */
    public function update(Request $request, Variation $variation)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'var_name' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Met à jour les données de la variation avec les données validées
        $variation->var_name = $validatedData['var_name'];
        // Si vous avez d'autres champs à mettre à jour, ajoutez-les ici

        // Sauvegarde des modifications dans la base de données
        $variation->save();

        // Retourne une réponse JSON avec la variation mise à jour
        return response()->json($variation);
    }

    /**
     * Supprime la ressource spécifiée de la base de données.
     */
    public function destroy(Variation $variation)
    {
        // Supprime la variation de la base de données
        $variation->delete();

        // Retourne une réponse JSON avec un message indiquant que la variation a été supprimée
        return response()->json(['message' => 'Variation deleted successfully']);
    }
}
