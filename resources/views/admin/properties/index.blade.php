@extends('admin.admin')

@section('title', 'Tous les biens')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">
            Ajouter un bien
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr>
                <td>{{ $property->title }}</td>
                <td>{{ $property->surface }}m²</td>
                <td>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                <td>{{ $property->city }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-sm btn-primary me-2">
                            Modifier
                        </a>
                        <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}

@endsection
