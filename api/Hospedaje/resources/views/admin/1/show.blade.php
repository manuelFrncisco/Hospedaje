@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Detalles del Alojamiento</h2>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="{{ route('admin.lodgings.index') }}">Atrás</a>
        </ol>
        <div class="mb-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>ID: {{ $lodging->id }}</h3>
                    <h3>Calle: {{ $lodging->name }}</h3>
                    <h3>Pais: {{ $lodging->description }}</h3>
                    <h3><img src="{{$lodging->image}}" height="200" width="200"></h3>
                    <h3>{{$lodging->page}}</h3>
                    <h3>{{$lodging->backroom}}</h3>
                    <h3>{{$lodging->location->streep}}</h3>
                    <h3>{{$lodging->user->name}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
