@extends('admin.admin')

@section('title', 'Toutes les option')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">
            Ajouter une option
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($options as $option)
            <tr>
                <td>{{ $option->name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-sm btn-primary me-2">
                            Modifier
                        </a>
                        <form action="{{ route('admin.option.destroy', $option) }}" method="post">
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

    {{ $options->links() }}

@endsection
