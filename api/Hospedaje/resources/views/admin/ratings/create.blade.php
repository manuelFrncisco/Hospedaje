@extends('layouts.panel')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Crear Califiacion</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/califiacion">Atras</a>
            </ol>
            <div class="card mb-4 p-3">

                <form action="{{ route('RatingCreate') }}" method="POST">
                    @csrf
                    <div class="form-group mt-2 mb-2">
                        <label for="number">Número (1-5)</label>
                        <input type="number" class="form-control" id="number" name="number" min="1"
                            max="5" required>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group mt-3 mb-3">
                        <select name="lodging_id" id="lodging_id" class="form-select">
                            <option value="">Seleciona el Alojamiento</option>
                            @foreach ($lodgings as $lodging)
                                <option value="{{ $lodging->id }}">{{ $lodging->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="reservation_id">Selecciona una Reservación</label>
                        <select class="form-control" id="reservation_id" name="reservation_id">
                            <option value="">Selecciona una reservación</option>
                            @foreach ($reservations as $reservation)
                                <option value="{{ $reservation->id }}">{{ $reservation->id }} -
                                    {{ $reservation->start_date }} -
                                    {{ $reservation->end_date }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 mb-2">
                        <button type="submit" class="btn btn-success">Enviar Califiacion</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
