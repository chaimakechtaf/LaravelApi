<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs de la base de données
        return response()->json($users);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'user_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'code_postal' => 'required|string|max:255',
        ]);

        // Crée une nouvelle instance d'utilisateur avec les données validées
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->user_name = $validatedData['user_name'];
        $user->phone = $validatedData['phone'];
        $user->adress = $validatedData['adress'];
        $user->ville = $validatedData['ville'];
        $user->pays = $validatedData['pays'];
        $user->code_postal = $validatedData['code_postal'];
        // Si vous avez d'autres champs à remplir, ajoutez-les ici

        // Sauvegarde de l'utilisateur dans la base de données
        $user->save();

        // Retourne une réponse JSON avec l'utilisateur nouvellement créé
        return response()->json($user);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Affiche le formulaire pour éditer la ressource spécifiée.
     */
    public function edit(User $user)
    {
        return response()->json($user);
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données.
     */
    public function update(Request $request, User $user)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8',
            'user_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'code_postal' => 'required|string|max:255',
        ]);

        // Met à jour les données de l'utilisateur avec les données validées
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if(isset($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->user_name = $validatedData['user_name'];
        $user->phone = $validatedData['phone'];
        $user->adress = $validatedData['adress'];
        $user->ville = $validatedData['ville'];
        $user->pays = $validatedData['pays'];
        $user->code_postal = $validatedData['code_postal'];
        // Si vous avez d'autres champs à mettre à jour, ajoutez-les ici

        // Sauvegarde des modifications dans la base de données
        $user->save();

        // Retourne une réponse JSON avec l'utilisateur mis à jour
        return response()->json($user);
    }

    /**
     * Supprime la ressource spécifiée de la base de données.
     */
    public function destroy(User $user)
    {
        // Supprime l'utilisateur de la base de données
        $user->delete();
    
        // Retourne une réponse JSON avec un message indiquant que l'utilisateur a été supprimé
        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
