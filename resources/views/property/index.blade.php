@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div>
        <form action="" method="get">
            <input type="number" placeholder="Surface minimale" name="surface" value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de pièce minimum" name="rooms" value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget max" name="price" value="{{ $input['price'] ?? '' }}">
            <input placeholder="Mot clés" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-3">
                    @include('property.card')
                </div>
            @empty
                <div class="col-3">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse
        </div>

        <div>
            {{ $properties->links() }}
        </div>
    </div>

@endsection
