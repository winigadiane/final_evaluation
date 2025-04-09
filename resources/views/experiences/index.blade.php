
@extends('welcome')

@section('contenu')

        

<main>
    
    <section class="container mt-5 text-white" style="background-color:#17172a; color: white; padding:1.5rem 1.5rem">
        <div class="d-flex mb-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/log.png') }}" alt="Logo Début">
            </a>
    
            
            <div class="mx-auto"></div>
    
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/mon_experience.png') }}" alt="Logo Fin">
            </a>
        </div>
        <h2 class="text-center mb-2" style="font-family: 'Anton', sans-serif;"> <span  class="" style="color: #00ffc3">Bienvenu sur</span> Xexperienxo</h2>
        <p class="text-center mb-3 " style="font-family: 'IBM Plex Sans', sans-serif;">Partagez votre experience de vie sur une plateforme dediée</p>

         <div class="d-flex justify-content-center mb-5 "> <img src="{{ asset('assets/images/nous.png') }}" alt=""></div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px" >     
                @forelse($les_experiences as $experience)
                <div class="mb-4 p-3 border rounded-5" style="font-family: 'IBM Plex Sans', sans-serif; background-color: rgba(255, 255, 255, 0.098)">
                     <div class="d-flex  mb-3"> 
                        <img src="{{ $experience->photo_profil  }}" alt="{{ asset('assets/images/profile.png') }}" class="img-fluid rounded " style="width: 80px; height: 80px; object-fit: cover; margin-right:10px;"> 
                    <div>
                        <h4>{{ $experience->nom_auteur }}</h4>
                    <p class=""style="color: #00ffc3">{{ $experience->description_auteur }}</p>
                    </div>
                     </div>
                    <p><strong>Histoire :</strong> {{ Str::limit($experience->description_experience, 100, '...') }}</p>
                    <p><strong>Date :</strong> {{ $experience->date_publication }}</p>
                  <div class="d-flex">
                    <p class="text-success">{{ $experience->nombre_like }}</p>
                    <img src="{{ asset('assets/images/like.png') }}" alt=""  height="20px">
                    <a href="{{ route('experiences.show', $experience) }}" class="btn btn-primary btn-sm" style="height: 30px;">Lire la suite</a>
                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" style="height: 30px;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette expérience ?')">Supprimer</button>
                    </form>
                    <div class="d-flex">
                    
                        {{-- <form action="{{ route('experiences.like', $experience->id) }}" method="POST" class="ms-2">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Like</button>
                        </form> --}}
                    </div>
                  </div>
                    
                </div>
            @empty
                <p class="text-center">Aucune expérience trouvée.</p>
                @endforelse
        
       </div>
        <div class="text-center mt-4">
            <a href="{{ route('experiences.create') }}" class="btn btn-primary">Créer une nouvelle expérience</a>
        </div>
        
    </section>
</main>
@endsection