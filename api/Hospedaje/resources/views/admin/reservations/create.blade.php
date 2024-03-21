@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Reservaciones</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <div class="card mb-4">
                <form method="POST" action="{{ route('ReservationCreate') }}">
                    @csrf
                    <div class="form-group">
                        <label for="lodging_id">Seleccione un alojamiento:</label>
                        <select class="form-control" id="lodging_id" name="lodging_id">
                            @foreach ($lodgings as $lodging)
                                <option value="{{ $lodging->id }}">{{ $lodging->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Fecha de inicio:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Fecha de fin:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reservar</button>
                </form>
                 
            </div>
        </div>
    </main>

@endsection


