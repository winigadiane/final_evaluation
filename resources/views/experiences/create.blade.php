
@extends("welcome")

@section("contenu")
<main>
    <section class="container mt-5">
        
        <h2 class="text-center mb-4"> Créer une nouvelle expérience</h2>

        <form action="{{ route('experiences.store') }}", method="POST">
            @csrf
            <div class="mb-3 g-6">
                <label for="description_experience" class="form-label">Expérience</label>
                <textarea type="text" rows="4" class="form-control" id="description_experience" name="description_experience" value="{{ old('description_experience') }}" required ></textarea>
            </div>
            <div class="mb-3 g-6">
                <label for="photo_profil" class="form-label">Photo de profil</label>
                <input class="form-control" id="photo_profil" name="photo_profil"  value="{{ old('description_experience') }}"  required></input>
            </div>
            <div class="mb-3 g-6">
                <label for="nom_auteur" class="form-label">Nom</label>
                <input class="form-control" id="nom_auteur" name="nom_auteur"  value="{{ old('nom_auteur') }}"  required></input>
            </div>
            <div class="mb-3 g-6">
                <label for="description_auteur" class="form-label">Description</label>
                <input type="description_auteur" class="form-control" id="description_auteur" name="description_auteur" value="{{ old('description_auteur') }}">
            </div>
            <div class="mb-3 g-6">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date_publication" name="date_publication" value="{{ old('date_publication') }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enregistrer</button>

                <a href="" class="btn btn-secondary">Modifier</a>
            </div>
        </form>
    </section>
</main>
@endsection