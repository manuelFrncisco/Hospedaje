@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Detalles del País</h2>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="{{ route('admin.countries.index') }}">Atrás</a>
        </ol>
        <div class="mb-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>ID: {{ $country->id }}</h3>
                    <h3>Nombre: {{ $country->name }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
