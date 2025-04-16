
@extends('welcome')

@section('contenu')
<main>
    <section class="container mt-5 text-white" style="background-color:#17172a; color: white; padding:1.5rem 1.5rem">
        <div class="d-flex mb-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/log.png') }}" alt="Logo Début">
            </a>
            <div class="mx-auto"></div>
            @auth
            <form action="{{ route('utilisateurs.logout') }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Déconnexion</button>
            </form>
            @endauth
        </div>

        <div class="card shadow-sm mb-5 w-75 mx-auto">
            <div class="card-header" style="background-color: #17172a; color: rgba(255, 255, 255, 0.406) ;">
                <h3>{{ $utilisateur->nom_utilisateur }} {{ $utilisateur->prenom }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $utilisateur->nom_utilisateur }}</p>
                <p><strong>Prénom :</strong> {{ $utilisateur->prenom }}</p>
                <p><strong>Email :</strong> {{ $utilisateur->email }}</p>
                <p><strong>Biographie :</strong> {{ $utilisateur->biographie ?? 'Aucune biographie fournie.' }}</p>
                <p><strong>Date d'inscription :</strong> {{ $utilisateur->created_at->format('d/m/Y') }}</p>
                <p><strong>Photo de profil :</strong></p>
                @if($utilisateur->photo_profil)
                    <img src="{{ $utilisateur->photo_profil }}" alt="Photo de profil" class="img-fluid rounded" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <p>Pas de photo de profil.</p>
                @endif
            </div>
        </div>

        <h3 class="text-center mt-5">Mes Expériences</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px">
            @forelse($les_experiences as $experience)
                <div class="mb-4 p-3 border rounded-5" style="font-family: 'IBM Plex Sans', sans-serif; background-color: rgba(255, 255, 255, 0.098)">
                    <div class="d-flex mb-3">
                        <img src="{{ $experience->photo_profil }}" alt="{{ asset('assets/images/profile.png') }}" class="img-fluid rounded-4" style="width: 80px; height: 80px; object-fit: cover; margin-right:10px;">
                        <div>
                            <h6>{{ $experience->nom_auteur }}</h6>
                            <p class="small" style="color: #00ffc3">{{ $experience->description_auteur }}</p>
                        </div>
                    </div>
                    <p><strong>Histoire :</strong> {{ Str::limit($experience->description_experience, 100, '...') }}</p>
                    <p class="small" style="color: rgba(255, 255, 255, 0.735);"><strong>Date :</strong> {{ $experience->date_publication }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex">
                            <p class="text-success">{{ $experience->nombre_like }}</p>
                            <img src="{{ asset('assets/images/like.png') }}" alt="" height="20px">
                        </div>
                        <a href="{{ route('experiences.show', $experience) }}" class="btn btn-sm" style="color: white; font-size: 16px;">voir plus 
                            <img src="{{ asset('assets/images/voir-plus.png') }}" alt="" height="15px">
                        </a>
                         <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST"
                                class="ms-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-3" style="width:89px"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette expérience ?')" >Supprimer</button>
                                    <a href="{{ route('experiences.edit', $experience->id) }}" class="btn  ms-3" style="background-color: #00ffc3; width:75px">Modifier</a>   
                            </form> 
                    </div>
                </div>
            @empty
                <p class="text-center">Aucune expérience trouvée pour cet utilisateur.</p>
            @endforelse
        </div>
    </section>
</main>
@endsection