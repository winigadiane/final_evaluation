
@extends('welcome')

@section('contenu')
<main>
    <section class="container mt-5">
        <h2 class="text-center mb-4">Enregistrez vous</h2>
        <form action="{{ route('utilisateurs.registerStore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom_utilisateur" class="form-label">Nom</label>
                <input value="{{ old('nom_utilisateur') }}" type="text" class="form-control" id="Nom" name="nom_utilisateur" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="Prenom" class="form-label">Prenom</label>
                <input value="{{ old('prenom') }}" type="Prenom" class="form-control" id="Prenom" name="prenom" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input value="{{ old('password') }}" type="password" class="form-control" id="password" name="password" placeholder="" required>
                @error('password')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                    
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="biographie" class="form-label">Biographie</label>
                <textarea value="{{ old('biographie') }}" type="text" class="form-control" id="biographie" name="biographie" placeholder="" required>
                </textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Envoyer
                </button>
            </div>
        </form>
    </section>
</main>
@endsection