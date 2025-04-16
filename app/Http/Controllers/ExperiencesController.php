<?php

namespace App\Http\Controllers;

use App\Models\Experiences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperiencesController extends Controller
{
    public function create(){
       $user = Auth::user();
       if($user == null){
        return view('utilisateurs.login');
       }
        return view("experiences.create");
    }
    public function store(Request $request)
   {
    $request->validate([
        'description_experience' => 'required|string',
        'photo_profil' => 'required|string',
        'nom_auteur' => 'required|string',
        'description_auteur' => 'required|string',
        'date_publication' => 'required|date',
    ]);

    // Associer l'expérience à l'utilisateur connecté
    Auth::user()->experiences()->create($request->all());

    return redirect()->route('experiences.index')->with('success', 'Expérience ajoutée avec succès.');
    }
    public function index(){
        $les_experiences = Experiences::all();
        return view('experiences.index',compact('les_experiences'));
    }
    public function edit( Experiences  $experience ){
        return view('experiences.edit',compact('experience'));
    }

   
    public function show (Experiences $experience){
        return view('experiences.show',compact('experience'));
    }
    public function update(Request $request, Experiences $experience)
    {
        $validatedData = $request->validate([
            'description_experience' => 'required|string',
            'photo_profil' => 'required|string',
            'nom_auteur' => 'required|string',
            'description_auteur' => 'required|string',
            'date_publication' => 'required|date',
        ]);
    
        
        $experience->update($validatedData);
    
        return redirect()->route('experiences.index');
    }
    public function destroy(Experiences $experience)
    {
        $experience->delete(); // Supprime l'expérience de la base de données
        return redirect()->route('experiences.index')->with('success', 'Expérience supprimée avec succès.');
    }
    public function like(Experiences $experience)
    {
        $experience->increment('nombre_like');
    
        return redirect()->route('experiences.show', $experience->id);
    }

}
