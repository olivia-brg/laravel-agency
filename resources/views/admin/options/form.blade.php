@extends('admin.admin')

@section('title', $option->exists ? "Éditer une option" : "Ajouter une option")

@section('content')

    <h1>@yield('title')</h1>

    <form
        class="flex flex-col gap-2"
        action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">

        @csrf
        @method($option->exists ? 'put' : 'post')
        @include('shared.input', ['label' => 'Nom', 'name' => 'name', 'value' => $option->name])

        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                @if($option->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection
