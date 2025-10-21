@extends('base')

@section('title', $property->title)

@section('content')
    <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>
    <div>
        {{ number_format($property->price, thousands_separator: ' ') }} €
    </div>

    <div>
        <h4>Intéressé par ce bien ?</h4>
        <form action="" method="post">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'w-full', 'label' => 'Prénom', 'name' => 'firstname'])
                @include('shared.input', ['class' => 'w-full', 'label' => 'Nom', 'name' => 'lastname'])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'w-full', 'label' => 'Téléphone', 'name' => 'phone'])
                @include('shared.input', ['type' => 'email', 'class' => 'w-full', 'label' => 'Email', 'name' => 'email'])
            </div>
            @include('shared.input', ['type' => 'textarea', 'class' => 'w-full', 'label' => 'Votre message', 'name' => 'message'])

            <button type="submit">Nous contacter</button>
        </form>

        <div>
            <p>{{ nl2br($property->description) }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambre</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">

                    <h2>Spécificité</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">
                                {{ $option->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
