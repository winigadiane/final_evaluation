<?php

namespace App\Http\Controllers;

use App\Models\Experiences;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UtilisateursController extends Controller
{
    public function register()
    {
        return view("utilisateurs.register");
    }


    public function store(Request $request)
    {
        $datas = $request->validate([
            'nom_utilisateur' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'password' => 'required|string|min:8',
            'biographie' => 'required|string|min:8',
        ]);

        $datas['password'] = Hash::make($datas['password']);
        Utilisateurs::create($datas);

        return redirect()->route('login');
    }

    public function loginpage()
    {
        return view("utilisateurs.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        // dd($credentials);
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            return redirect()->route('experiences.index');
        }

        return redirect()->back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function index()
    {
        $utilisateur = Auth::user(); 
        $les_experiences = $utilisateur->experiences; 
        return view('utilisateurs.index', compact('utilisateur', 'les_experiences'));
    }
    public function show(Utilisateurs $utilisateur)
    {
        return view('utilisateurs.show', compact('utilisateur'));
    }
    public function logout(Utilisateurs $utilisateur)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
