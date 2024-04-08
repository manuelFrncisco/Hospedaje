@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Detalles del Reservation</h2>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="{{ route('admin.reservations.index') }}">Atrás</a>
        </ol>
        <div class="mb-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>ID: {{ $reservation->id }}</h3>
                    <h3>Nombre de Usuario: {{ $reservation->user->name }}</h3>
                    <h3>Nombre de Alojamiento: {{$reservation->lodging->name}}</h3>
                    <h3>Fecha de Inicio de Reserva: {{$reservation->start_date}} </h3>
                    <h3>Fecha de Finalizacion de la Reserva: {{$reservation->end_date}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
