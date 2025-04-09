    
    @extends('welcome')
    
    @section('contenu')
    <main>
        <section class="container mt-5">
            <h2 class="text-center mb-4">Détails de l'expérience</h2>
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $experience->id }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Description :</strong>{{ $experience->description_experience }}</p>
                    <p>{{ $experience->nom_auteur }}</p>
                    <p><strong>Date :</strong> {{ $experience->date_publication }}</p>
                </div>
                <div class="card-footer text-center d-flex ms-3">
                    <form action="{{ route('experiences.like', $experience->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg ms-3" style=" width: 100px">Like</button>
                    </form>
                    <a href="{{ route('experiences.index') }}" class="btn btn-secondary ms-3">Retour à la liste</a>
                    <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-warning ms-3">Modifier</a>
                    
                </div>
            </div>
        </section>
    </main>

</div>

@endsection