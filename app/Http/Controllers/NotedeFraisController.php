<?php

namespace App\Http\Controllers;

use App\Models\NotedeFrais;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNotedeFraisRequest;
use App\Http\Requests\UpdateNotedeFraisRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Jetstream;


class NotedeFraisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = NotedeFrais::all();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotedeFraisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $userId = Auth::id();
        
        //$note = NotedeFrais::create($request->all());
        //$userId = Auth::id();
       // $note->user_id = $userId;
      // $preuvePath = 'preuve'::store('preuve-notes');
      // return redirect()->route('notes.index');

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'date_depense' => 'required|date',
            'preuve' => 'required|file|mimes:png,jpg,jpeg,pdf|max:2048', // Limitez la taille du fichier à 2 Mo
            // Autres règles de validation pour les autres champs de dépense
        ]);

        // Obtenir l'ID de l'utilisateur actuellement authentifié
        $userId = Auth::id();
        

        // Traiter le téléchargement de la preuve de dépense
        $preuvePath = $request->file('preuve')->store('preuves-notes');

        // Créer une nouvelle instance de dépense de voyage avec les données validées
        $note = new NotedeFrais();
        $note->description = $validatedData['description'];
        $note->montant = $validatedData['montant'];
        $note->date_depense = $validatedData['date_depense'];
        $note->preuve = $preuvePath; // Stockez le chemin vers la preuve de dépense dans la base de données
        $note->user_id = $userId; // Stockez l'ID de l'utilisateur dans la base de données
        // Définissez d'autres attributs de la dépense de voyage
        
        //$note->user_id = $request->user()->id;
        // Sauvegarder la dépense de voyage dans la base de données
        $note->save();

        // Rediriger l'utilisateur vers la liste des dépenses de voyage avec un message de succès
        return redirect()->route('notes.index')->with('success', 'La dépense de voyage a été créée avec succès.');
    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotedeFrais  $notedeFrais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        {
            $notes = NoteDeFrais::findOrFail($id); // Assurez-vous que la note de frais existe
            return view('notes.show', compact('notes'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotedeFrais  $notedeFrais
     * @return \Illuminate\Http\Response
     */
    public function edit(NotedeFrais $notedeFrais)
    {
        return view('notes.edit', compact('notedeFrais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotedeFraisRequest  $request
     * @param  \App\Models\NotedeFrais  $notedeFrais
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotedeFraisRequest $request, NotedeFrais $notedeFrais)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotedeFrais  $notedeFrais
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotedeFrais $notedeFrais)
    {
        //
    }
}
