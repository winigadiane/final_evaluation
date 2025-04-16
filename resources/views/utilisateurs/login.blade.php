{{-- filepath: c:\Users\Dev-001\Desktop\project\exercice\Motivation\Motivation\resources\views\utilisateurs\create.blade.php --}}
@extends('welcome')

@section('contenu')
<main>
  
   
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Creer compte</a>
    @endif
    <section class="container mt-5">
        <h2 class="text-center mb-4">Connexion</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
           
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="" required>
            </div>
           
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
            <div>
                <p class="text-center mt-3">Vous n'avez pas de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
            </div>
        </form>
    </section>
</main>
@endsection