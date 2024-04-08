@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Detalles del Comentarios</h2>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="{{ route('admin.comments.index') }}">Atrás</a>
        </ol>
        <div class="mb-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>ID: {{ $comment->id }}</h3>
                    <h3>Mensaje: {{ $comment->messaje }}</h3>
                    <h3>Nombre de Alojamiento: {{ $comment->user->name }}</h3>
                    <h3>Nombre de Usuario: {{ $comment->lodging->name }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
