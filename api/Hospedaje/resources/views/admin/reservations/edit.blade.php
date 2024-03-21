@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Editar Reserva</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <div class="card mb-4">
                <form method="POST" action="{{ route('reservarEditar', $reservation->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="lodging_id">Alojamiento:</label>
                        <input type="text" class="form-control" value="{{ $reservation->lodging->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Fecha de inicio:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control"
                               value="{{ $reservation->start_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Fecha de fin:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control"
                               value="{{ $reservation->end_date }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </main>
@endsection
