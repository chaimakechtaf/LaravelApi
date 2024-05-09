<?php

namespace App\Http\Controllers;

use App\Models\VariationOption;
use Illuminate\Http\Request;

class VariationOptionsController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $variationOptions = VariationOption::all(); // Récupère toutes les options de variation de la base de données
        return response()->json($variationOptions);
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
            'var_option_name' => 'required|string|max:255',
            'variation_id' => 'required|exists:variations,id_var', // Assurez-vous que l'ID de la variation existe dans la table des variations
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Crée une nouvelle instance d'option de variation avec les données validées
        $variationOption = new VariationOption();
        $variationOption->var_option_name = $validatedData['var_option_name'];
        $variationOption->variation_id = $validatedData['variation_id'];
        // Si vous avez d'autres champs à remplir, ajoutez-les ici

        // Sauvegarde de l'option de variation dans la base de données
        $variationOption->save();

        // Retourne une réponse JSON avec l'option de variation nouvellement créée
        return response()->json($variationOption);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(VariationOption $variationOption)
    {
        return response()->json($variationOption);
    }

    /**
     * Affiche le formulaire pour éditer la ressource spécifiée.
     */
    public function edit(VariationOption $variationOption)
    {
        return response()->json($variationOption);
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données.
     */
    public function update(Request $request, VariationOption $variationOption)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'var_option_name' => 'required|string|max:255',
            'variation_id' => 'required|exists:variations,id_var', // Assurez-vous que l'ID de la variation existe dans la table des variations
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Met à jour les données de l'option de variation avec les données validées
        $variationOption->var_option_name = $validatedData['var_option_name'];
        $variationOption->variation_id = $validatedData['variation_id'];
        // Si vous avez d'autres champs à mettre à jour, ajoutez-les ici

        // Sauvegarde des modifications dans la base de données
        $variationOption->save();

        // Retourne une réponse JSON avec l'option de variation mise à jour
        return response()->json($variationOption);
    }

    /**
     * Supprime la ressource spécifiée de la base de données.
     */
    public function destroy(VariationOption $variationOption)
    {
        // Supprime l'option de variation de la base de données
        $variationOption->delete();

        // Retourne une réponse JSON avec un message indiquant que l'option de variation a été supprimée
        return response()->json(['message' => 'Variation option deleted successfully']);
    }
}
