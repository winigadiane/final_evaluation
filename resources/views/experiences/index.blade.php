@extends('welcome')

@section('contenu')
    <main>

        <section class="container mt-5 text-white" style="background-color:#17172a; color: white; padding:1.5rem 1.5rem">
            <div class="d-flex mb-5">
                <a class="navbar-brand " href="#">
                    <img src="{{ asset('assets/images/log.png') }}" alt="Logo Début">
                </a>


                <div class="mx-auto"></div>
                @auth
                <form action="{{ route('utilisateurs.logout') }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; background-color: white; border-radius: 50%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"> <a href="{{ route('utilisateurs.index') }}"><img src="{{ $experience->photo_profil ?? asset('assets/images/profile.png')}}" alt="{{ asset('assets/images/profile.png') }}"
                        class="img-fluid  rounded-5" style=" object-fit: cover;"></a>
                     </div>
                    
                </form>
                @endauth
                @guest
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <a href="{{ route('register') }}" class="link" style="padding: 10px; color:  #00ffc3; font-weight: bold;">Créer compte</a>
            
                <a href="{{ route('login') }}" class="link" style="padding: 10px; color: #00ffc3; font-weight: bold;">Connexion</a>
                </div>
            @endguest
              
            </div>
            <h2 class="text-center mb-2" style="font-family: 'Anton', sans-serif;"> <span class=""
                    style="color: #00ffc3">Bienvenu sur</span> Xexperienxo</h2>
            <p class="text-center mb-3 " style="font-family: 'IBM Plex Sans', sans-serif;">Partagez votre experience de vie
                sur une plateforme dediée</p>

            <div class="d-flex justify-content-center mb-5 "> <img src="{{ asset('assets/images/nous.png') }}"
                    alt=""></div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px">
                @forelse($les_experiences as $experience)
                    <div class="mb-4 p-3 border rounded-5"
                        style="font-family: 'IBM Plex Sans', sans-serif; background-color: rgba(255, 255, 255, 0.098)">
                        <div class="d-flex  mb-3">
                            <img src="{{ $experience->photo_profil }}" alt="{{ asset('assets/images/profile.png') }}"
                                class="img-fluid  rounded-4"
                                style="width: 80px; height: 80px; object-fit: cover; margin-right:10px;">
                            <div>
                                <h6>{{ $experience->nom_auteur }}</h6>
                                <p class="small"  style="color: #00ffc3">{{ $experience->description_auteur }}</p>
                            </div>
                        </div>
                        <p><strong>Histoire :</strong> {{ Str::limit($experience->description_experience, 100, '...') }}</p>
                        <p class="small " style="color: rgba(255, 255, 255, 0.735);"><strong>Date : </strong>{{ $experience->date_publication }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex">
                                <p class="text-success">{{ $experience->nombre_like }}</p>
                            <img src="{{ asset('assets/images/like.png') }}" alt="" height="20px">
                            </div>
                            <a href="{{ route('experiences.show', $experience) }}" class="btn  btn-sm" style="color: white; font-size: 16px;"
                                style="height: 30px;">voir plus 
                                <img src="{{ asset('assets/images/voir-plus.png') }}" alt=""height="15px">
                            </a>
                        </div>
                           
                            
                        

                    </div>
                @empty
                    <p class="text-center">Aucune expérience trouvée.</p>
                @endforelse

            </div>
            <div  class="d-flex justify-content-center align-items-center mt-4 gap-3">
                <div class="">
                    <a class="navbar-brand btnbtn-sm " href="{{ route('experiences.create') }}">
                        <img src="{{ asset('assets/images/mon_experience.png') }}" alt="Logo Fin">
                    </a>
                </div>
                   
                

            </div>
            

        </section>
    </main>
@endsection
