@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Detalles del Localizacion</h2>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="{{ route('admin.locations.index') }}">Atrás</a>
        </ol>
        <div class="mb-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>ID: {{ $location->id }}</h3>
                    <h3>Calle: {{ $location->steep }}</h3>
                    <h3>Pais: {{ $location->country->name }}</h3>
                    <h3>Postal: {{$location->postal}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
