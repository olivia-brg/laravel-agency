@extends('base')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence De Fou</h1>
            <p>Bienvenu sur Agence De Fou</p>
            <p>
                Vous trouverez ici toutes les informations concernant nos biens disponibles.
            </p>
            <p>
                Niquez vous bien
            </p>
        </div>

        <div class="container">
            <h2>Nos derniers biens</h2>
            <div class="row">
                @foreach($properties as $property)
                    <div class="col">
                        @include('property.card')
                    </div>

                @endforeach
            </div>
        </div>

    </div>
@endsection
