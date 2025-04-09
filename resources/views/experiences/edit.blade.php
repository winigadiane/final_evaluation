
@extends("welcome")

@section("contenu")
<main>
    <section class="container mt-5">
        <h2 class="text-center mb-4">Modifier une expérience</h2>

        <form action="{{ route('experiences.update', $experience->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            <div class="mb-3 g-6">
                <label for="description_experience" class="form-label">Expérience</label>
                <textarea type="text" rows="4" class="form-control" id="description_experience" name="description_experience" required>{{ $experience->description_experience }}</textarea>
            </div>
            <div class="mb-3 g-6">
                <label for="photo_profil" class="form-label">Photo de profil</label>
                <input class="form-control" id="photo_profil" name="photo_profil" value="{{ $experience->photo_profil }}" required>
            </div>
            <div class="mb-3 g-6">
                <label for="nom_auteur" class="form-label">Nom</label>
                <input class="form-control" id="nom_auteur" name="nom_auteur" value="{{ $experience->nom_auteur }}" required>
            </div>
            <div class="mb-3 g-6">
                <label for="description_auteur" class="form-label">Description</label>
                <input type="text" class="form-control" id="description_auteur" name="description_auteur" value="{{ $experience->description_auteur }}" required>
            </div>
            <div class="mb-3 g-6">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date_publication" name="date_publication" value="{{ $experience->date_publication }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                <a href="{{ route('experiences.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </section>
</main>
@endsection