
@extends('welcome')

@section('contenu')
<main>
    <section class="container mt-5">
        <h2 class="text-center mb-4">Liste des utilisateurs</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Biographie</th>
                    <th>Photo de profil</th>
                </tr>
            </thead>
            <tbody>
                @forelse($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->nom_utilisateurs }}</td>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>{{ $utilisateur->biographie ?? 'Aucune biographie' }}</td>
                    <td>
                        @if($utilisateur->photo_profil)
                        <img src="{{ asset('storage/' . $utilisateur->photo_profil) }}" alt="Photo de profil" width="50" height="50" class="rounded-circle">
                        @else
                        Pas de photo
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun utilisateur trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</main>
@endsection