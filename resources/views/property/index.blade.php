@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($properties as $property)
                <div class="col-3">
                    @include('property.card')
                </div>

            @endforeach
        </div>

        <div>
            {{ $properties->links() }}
        </div>
    </div>

@endsection
