@extends('layouts.panel')

@section('content')
    <div class="container">
        <h1>Editar Rating</h1>
        <form action="{{ route('RatingEdit', $rating->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="number">Número (1-5)</label>
                <input type="number" class="form-control" id="number" name="number" min="1" max="5" value="{{ $rating->number }}" required>
            </div>
            <div class="form-group">
                <label for="lodging_id">Alojamiento</label>
                <select class="form-control" id="lodging_id" name="lodging_id">
                    @foreach($lodgings as $lodging)
                        <option value="{{ $lodging->id }}" {{ $rating->lodging_id == $lodging->id ? 'selected' : '' }}>
                            {{ $lodging->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="reservation_id">Reservación</label>
                <select class="form-control" id="reservation_id" name="reservation_id">
                    @foreach($reservations as $reservation)
                        <option value="{{ $reservation->id }}" {{ $rating->reservation_id == $reservation->id ? 'selected' : '' }}>
                            {{ $reservation->id }} - {{ $reservation->start_date }} - {{ $reservation->end_date }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Rating</button>
        </form>
    </div>
@endsection
