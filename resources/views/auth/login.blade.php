@extends('base')

@section('title', 'Se connecter')

@section('content')
    <div class="m4-container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" action="{{ route('login') }}" class="v-stack gap-4">
            @csrf
            @include('shared.input', ['type' => 'email', 'class' => 'w-full', 'label' => 'Email', 'name' => 'email'])
            @include('shared.input', ['type' => 'password', 'class' => 'w-full', 'label' => 'Mot de passe', 'name' => 'password'])
            <div>
                <button class="btn btn-pr">Se connecter</button>
            </div>

        </form>
    </div>
@endsection
