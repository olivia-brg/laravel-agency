@extends('admin.admin')

@section('title', $property->exists ? "Éditer un bien" : "Ajouter un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form
        class="flex flex-col gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="space-y-4">

            @include('shared.input', ['class' => 'w-full', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])

            <div class="grid grid-cols-2 gap-4">
                @include('shared.input', ['class' => 'w-full', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['class' => 'w-full', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
            </div>

            @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])

            <div class="grid grid-cols-3 gap-4">
                @include('shared.input', ['class' => 'w-full', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
                @include('shared.input', ['class' => 'w-full', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                @include('shared.input', ['class' => 'w-full', 'label' => 'Étage', 'name' => 'floor', 'value' => $property->floor])
            </div>

            <div class="grid grid-cols-3 gap-4">
                @include('shared.input', ['class' => 'w-full', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                @include('shared.input', ['class' => 'w-full', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
                @include('shared.input', ['class' => 'w-full', 'label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
            </div>

            @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold])

        </div>


        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                @if($property->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection
