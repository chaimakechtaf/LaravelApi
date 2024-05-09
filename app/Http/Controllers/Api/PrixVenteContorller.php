<?php

namespace App\Http\Controllers;

use App\Models\PrixAchat;
use Illuminate\Http\Request;

class PrixAchatsController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $prixAchats = PrixAchat::all(); // Récupère tous les prix d'achat de la base de données
        return response()->json($prixAchats);
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
            'type' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Crée une nouvelle instance de prix d'achat avec les données validées
        $prixAchat = new PrixAchat();
        $prixAchat->type = $validatedData['type'];
        // Si vous avez d'autres champs à remplir, ajoutez-les ici

        // Sauvegarde du prix d'achat dans la base de données
        $prixAchat->save();

        // Retourne une réponse JSON avec le prix d'achat nouvellement créé
        return response()->json($prixAchat);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(PrixAchat $prixAchat)
    {
        return response()->json($prixAchat);
    }

    /**
     * Affiche le formulaire pour éditer la ressource spécifiée.
     */
    public function edit(PrixAchat $prixAchat)
    {
        return response()->json($prixAchat);
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données.
     */
    public function update(Request $request, PrixAchat $prixAchat)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Met à jour les données du prix d'achat avec les données validées
        $prixAchat->type = $validatedData['type'];
        // Si vous avez d'autres champs à mettre à jour, ajoutez-les ici

        // Sauvegarde des modifications dans la base de données
        $prixAchat->save();

        // Retourne une réponse JSON avec le prix d'achat mis à jour
        return response()->json($prixAchat);
    }

    /**
     * Supprime la ressource spécifiée de la base de données.
     */
    public function destroy(PrixAchat $prixAchat)
    {
        // Supprime le prix d'achat de la base de données
        $prixAchat->delete();

        // Retourne une réponse JSON avec un message indiquant que le prix d'achat a été supprimé
        return response()->json(['message' => 'Prix Achat deleted successfully']);
    }
}
