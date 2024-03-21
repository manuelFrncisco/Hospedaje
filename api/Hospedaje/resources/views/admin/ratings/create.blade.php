@extends('layouts.panel')

@section('content')
    <div class="container">
        <h1>Crear Rating</h1>
        <form action="{{ route('RatingCreate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">Número (1-5)</label>
                <input type="number" class="form-control" id="number" name="number" min="1" max="5" required>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <select name="lodging_id" id="lodging_id">
                    <option value="">Seleciona el Alojamiento</option>
                    @foreach ($lodgings as $lodging)
                        <option value="{{ $lodging->id }}">{{ $lodging->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="reservation_id">Selecciona una Reservación</label>
                <select class="form-control" id="reservation_id" name="reservation_id">
                    <option value="">Selecciona una reservación</option>
                    @foreach ($reservations as $reservation)
                        <option value="{{ $reservation->id }}">{{ $reservation->id }} - {{ $reservation->start_date }} -
                            {{ $reservation->end_date }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Rating</button>
        </form>
    </div>
@endsection
